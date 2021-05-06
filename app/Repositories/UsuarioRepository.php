<?php

namespace App\Repositories;

use App\Usuario;
use App\Unidade;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;


class UsuarioRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Usuario();
    }

    public function filtroIndex($request)
    {
        $desbravadores = $this->model;
        // ->leftJoin('unidades', 'unidades.id', '=', 'usuarios.unidade_id');

        if (!empty($request->query)) {
            $query = $request->query();

            if (isset($query['ativo'])) {
                $desbravadores = $desbravadores
                    ->where('ativo', $query['ativo']);
            } else {
                $desbravadores = $desbravadores
                    ->where('ativo', true);
            }

            if (isset($query['search'])) {
                $desbravadores = $desbravadores
                    ->where(function ($q)  use ($query) {
                        $q->where('nome', 'like', '%' . $query['search'] . '%')
                            ->orWhere('sobrenome', 'like', '%' . $query['search'] . '%');
                    });
            }
        }

        return $desbravadores->orderBy('nome', 'asc')->paginate(20);
    }

    public function atualizarQrCodeUsuario($id, $nomeQrcode)
    {
        $usuario = $this->model::find($id);

        $usuario->qr_code = $nomeQrcode;

        $usuario->save();
    }

    public function criarQrcode($usuario)
    {
        $queryBuild = [
            'id_user' => $usuario->id,
        ];

        $queryString = http_build_query($queryBuild);
        $url = base64_encode($queryString);

        $nome_arquivo = md5(uniqid(microtime(), true)) . '' . md5($usuario->id) . '.png';

        $options = new QROptions(
            [
                'version'    => 4,
                'outputType' => QRCode::OUTPUT_IMAGE_PNG,
                'eccLevel'   => QRCode::ECC_Q,
                'imageBase64' => false
            ]
        );

        $qrcode = new QRCode($options);

        // and dump the output WWW_ROOT
        $qrCodeContent = $qrcode->render($url);

        Storage::disk('public')->put('QrCode/' . $nome_arquivo, $qrCodeContent);

        return $nome_arquivo;
    }

    public function verificarSeDesbravador($usuario_id)
    {
        $usuario = $this->model::find($usuario_id);

        return ($usuario->nivel == 'Desbravadores') ? true : false;
    }

    public function pegarQrCodePath($usuario)
    {

        return Storage::download('public/QrCode/' . $usuario->getQRCodeName(), 'QrCode ' . $usuario->nome . ' ' . $usuario->sobrenome . '.png');
    }

    public function removeFileDir($nameFile)
    {
        if (file_exists($nameFile)) {
            unlink($nameFile);
        }
    }
}
