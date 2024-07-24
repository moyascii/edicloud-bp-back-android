<?php
namespace App\Controllers;

use App\Models\UsuarioModel;

class LoginController extends BaseController
{
  public function index()
  {
    return view('v_login');
  }

  public function authenticate()
  {
    $session = session();
    $model = new UsuarioModel();
    
    // Obtener y limpiar las credenciales de entrada
    $input = $this->request->getJSON();
    $credential = trim($input->credential);
    $password = trim($input->clave);
    
    // Verificar que las credenciales no estén vacías
    if (empty($credential) || empty($password)) {
        return $this->response->setJSON([
            'success' => false,
            'message' => 'RUT o contraseña no pueden estar vacíos'
        ]);
    }
    
    // Obtener el usuario por la credencial
    $user = $model->getUserWithTipoUsuario($credential);
    
    if ($user && password_verify($password, $user['USUARIO_CLAVE'])) {
        // Establecer los datos de sesión
        $sessionData = [
            'user_id' => $user['USUARIO_ID'],
            'user_nombre' => $user['USUARIO_NOMBRE'],
            'user_rut' => $user['USUARIO_RUT'],
            'user_type' => $user['TIPO_USUARIO_NOMBRE'],
            'logged_in' => true,
        ];
        $session->set($sessionData);
        
        return $this->response->setJSON([
            'success' => true,
            'user' => $sessionData
        ]);
    } else {
        return $this->response->setJSON([
            'success' => false,
            'message' => 'RUT o contraseña incorrecta'
        ]);
    }
  }

  public function logout()
  {
    $session = session();
    $session->destroy();  // Destruye todas las datos de la sesión
    return $this->response->setJSON([
        'success' => true,
        'message' => 'Sesión cerrada correctamente'
    ]);
  }

  public function forgot_password()
  {
    return view('v_forgot_password');
  }

  public function reset_password()
  {
    $rut = $this->request->getPost('rut');
    $userModel = new UsuarioModel();
    $user = $userModel->where('USUARIO_RUT', $rut)->first();

    if ($user) {
      $newPassword = bin2hex(random_bytes(4)); // Genera una contraseña temporal
      $userModel->update($user['USUARIO_ID'], ['USUARIO_CLAVE' => password_hash($newPassword, PASSWORD_DEFAULT)]);

      // Enviar el correo con la nueva contraseña
      $emailService = \Config\Services::email();
      $emailService->setTo($user['USUARIO_CORREO']);
      $emailService->setSubject('Restablecimiento de contraseña');
      $emailService->setMessage("Tu nueva contraseña temporal es: $newPassword");
      $emailService->send();

      return $this->response->setJSON([
          'success' => true,
          'message' => 'Se ha enviado una nueva contraseña a tu correo.'
      ]);
    } else {
      return $this->response->setJSON([
          'success' => false,
          'message' => 'El RUT no está registrado.'
      ]);
    }
  }
}
