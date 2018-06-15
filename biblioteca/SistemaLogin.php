<?PHP
    
    class SistemaLogin{
        
        
        //función base para ejecutar la consulta
        protected static function ejecutaConsulta($sql){
            
            $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            
            $dwes = new PDO("mysql:host=localhost;dbname=biblioteca", 'tfc2018', 'velazquez', $opc);
            
            $resultado = null;
            
            if(isset($dwes)){
                $resultado = $dwes->query($sql);
            }
            
            return $resultado;
            
        }
        
        //función para verificar al usuario en el index
        public function verificaUsuario($usuario, $contrasena) {
            
            $sql = "SELECT USUARIO FROM administradores WHERE USUARIO='$usuario' AND CONTRASENA='$contrasena'";
            $resultado = self::ejecutaConsulta($sql);
            $verificado = false;
            
            if(isset($resultado)){
                $fila = $resultado->fetch();
                
                if($fila){
                    $verificado = true;
                }
                return $verificado;
                
            }
            
        }
         
                
    }

?>