<?php

/**
 * Description of dat_usuario
 *
 * @author CARLOS
 */
require_once 'conexion.php';

class dat_usuario {

    private $con; // conexion
    private $id;
    private $identificadorempresa;
    private $username;
    private $password;
    private $id_rol;
    private $nombre;
    private $telefono;
    private $activo;
    private $borrado;

    public function __construct() {
        $this->con = Conexion::getInstancia();
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdentificadorEmpresa($identificadorempresa) {
        $this->identificadorempresa = $identificadorempresa;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setIdRol($id_rol) {
        $this->id_rol = $id_rol;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

    public function setBorrado($borrado) {
        $this->borrado = $borrado;
    }

    public function registrar() {
        $this->con->conectar();
        $consulta = "insert into to_usuarios values(default,'$this->identificadorempresa','$this->username','$this->password',$this->id_rol,'$this->nombre','$this->telefono',$this->activo,$this->borrado);";
        $result = $this->con->ejecutarSQL($consulta);
        $this->con->desconectar();
        return $result;
    }

    public function consultarPorRol() {
        $this->con->Conectar();
        $consulta = "select id, nombre, activo
from to_usuarios
where id_rol = $this->id_rol
order by nombre;";
        $result = $this->con->getArray($consulta);
        $this->con->desconectar();
        return $result;
    }

    public function consultarPorCodigo() {
        $this->con->Conectar();
        $consulta = "select id, identificadorempresa, username, password, id_rol, nombre, telefono, activo, borrado
from to_usuarios
where id = $this->id;";
        $result = $this->con->getArray($consulta);
        $this->con->desconectar();
        return $result;
    }

    public function buscarUsuario() {
        $this->con->Conectar();
        $consulta = "select id, nombre, activo from to_usuarios where nombre LIKE '%$this->nombre';";
        $result = $this->con->getArray($consulta);
        $this->con->desconectar();
        return $result;
    }

    public function modificarUsuario() {
        $this->con->conectar();
        $consulta = "update to_usuarios
set identificadorempresa='$this->identificadorempresa', username='$this->username', password='$this->password', id_rol=$this->id_rol, nombre='$this->nombre', telefono='$this->telefono', activo=$this->activo, borrado=$this->borrado
where id = $this->id;";
        $result = $this->con->ejecutarSQL($consulta);
        $this->con->desconectar();
        return $result; 
    }
    
    public function consultarUsuarios($numero_pagina, $id_rol) {
        $this->con->Conectar();
        $pagina = ($numero_pagina - 1) * 10;
        if ( $id_rol == 0 ){
            $consulta = "select id, nombre, activo
                        from to_usuarios
                        order by nombre
                        limit $pagina,10;";
        }else{
            $consulta = "select id, nombre, activo, id_rol
                        from to_usuarios
                        where id_rol = 1
                        order by nombre
                        limit $pagina,10;";
        }
        $result = $this->con->getArray($consulta);
        $this->con->desconectar();
        return $result;
    }
}