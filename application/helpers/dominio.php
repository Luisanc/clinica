<?php

class dominio
{
    public function validarPassword($usuario,$pass)
	{
		$request = new request();
		$request->usuario = $usuario;
        $request->password = $pass;
        $response=null;
        
        //var_dump($request);        
		
		try {
	       $client = new SoapClient(WSDLDMN, array('classmap' => array('AutenticaUsuarioDominioResponse' => new response())));
	       $response = $client->ObtenerUsuarioValido($request);
	       $this->valido = $response->usuarioValido;
	       $this->mensaje = $response->mensaje;

		}catch (SoapFault $e) {     
       		$mensaje = $e->getMessage();
     	}
 		catch(Exception $e){
   			$mensaje = $e->getMessage();
        }
           
        return $response;
    }      
}

class request
{
 /**
  * @var string
  * @soap
  **/
  public $usuario;
  
  /**
  * @var string
  * @soap
  **/
  public $password;
}

class response
{
      /**
  * @var boolean
  * @soap
  **/
  public $usuarioValido;
  
  
  /**
  * @var string
  * @soap
  **/
  public $mensaje;
  
  public function __construct(){}
}

?>