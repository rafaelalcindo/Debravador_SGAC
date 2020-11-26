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

    public function pegarQrCodePath($usuario)
    {
        return Storage::download('public/QrCode/' . $usuario->qr_code, 'QrCode ' . $usuario->nome . ' ' . $usuario->sobrenome . '.png');
    }
}
