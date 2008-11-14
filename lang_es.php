<?

//cabecera
define("BACK","Atrás");
define("SERVER","Servidor");

//indice
define("MAPS","Mapas");
define("ALERTS","Alertas");
define("EVENTS","Eventos");
define("SEARCH","Buscar");
define("ABOUT","Acerca de");

define("ANNOUNCEMENT","Versión beta!");

//map
define("MAP","Mapa");

//device
define("DEVICE","Dispositivo");
define("IP","IP");
define("INTERFACES","Interfaces");
define("VIEW_INTERFACES","Ver interfaces");
define("ENTERPRISE","Fabricante");
define("PORT","Puerto");
define("DNS_NAME","Nombre DNS");
define("NETBIOS","Netbios");
define("IPRESOLVE","IP  Resuelta");
define("PROBE","Prueba");
define("LATITUE","Latitud");
define("LONGITUDE","Longitud");
define("SNMP_VER","Versión SNMP");
define("SYSNAME","Nombre");
define("SYSDESCR","Descripción");
define("SYSLOCATION","Hubicación");
define("SYSCONTACT","Contacto");
define("SYSUPTIME","Uptime");
define("MODEL","Modelo");
define("SERIAL_NUMBER","Num. Serie");
define("CREATE_TIME","Creado");
define("DELETE_TIME","Eliminado");
define("NOTES","Notas");
define("GRAPHS","Gráficas");

//interfaces
define("INTERFACES","Interfaces");
define("NAME","Nombre");
define("IF_NAME","Nombre Int.");
define("IF_DESC","Descripción");
define("DUPLEX","Duplex");
define("TX_SPEED","Velocidad TX");
define("RX_SPEED","Velocidad RX");
define("MAC","MAC");
define("VLAN","VLAN");
define("ENABLED","Activada");
define("ALIAS","Alias");
define("IF_TYPE","Tipo");
define("MTU","MTU");
define("LAST_CHANGE","Últ. cambio");

//graphs
define("GRAPH","Gráfica");

//search
define("SEARCH","Buscar");
define("NAME_SEARCH","Búsqueda por nombre");
define("IP_SEARCH","Búsqueda por IP");
define("NO_RESULTS","No hay ningún resultado");

//events
define("EVENTS","Eventos");
define("PREVIOUS","Anteriores");
define("NEXT","Siguientes");
define("DATA","Datos");
define("STATUS","Estado");
define("REASON","Razón");

//alerts
define("ALERTS","Alerts");

//server
define("SERVER","Servidor");
define("LOCATION","Localización");
define("CONTACT","Contacto");
define("NET","Red");
define("POLL","Poll");
define("DEVICE_INTERVAL","Intervalo disp.");
define("EVENT_INTERVAL","Intervalo event");
define("DATA_INTERVAL","Intervalo datos");

//about
define("ABOUT_TEXT",
"<p>MIMWI es una aplicación web orientada al iPhone de <a href=\"http://www.apple.com\">Apple</a>.</p>
<p>Utiliza como backend el motor de base de datos del <a href=\"http://dartware.com/support/tech_notes/im50/imdatabase.html\">Intermapper Database</a> disponible a partir de la versión 5.0.</p>
<p>La interfaz está realiza entera en <a href=\"http://www.php.net/\">PHP</a> (con soporte de pgsql y GD2); se han usado los iconos de <a href=\"http://www.famfamfam.com/\">FamFamFam</a>, el framework CSS y HTML <a href=\"http://code.google.com/p/iphone-universal/\">UiUIKit</a> y la librería <a href=\"http://www.aditus.nu/jpgraph/\">JpGraph</a> para las gráficas. </p><br />
<p>Para cualquier duda, bug o sugerencia: <img src=\"images/koldoaingeru_gmail.png\" alt=\"koldoaingeru\" /></p>
<p>Más información en la <a href=\"http://code.google.com/p/mimwi/\">página de Google Code</a> de MIMWI</p>
");

//errors
define("ERROR_DB_CONNECT",
"<html><head><title>MIMWI</title></head><body><h2>Imposible conectarse contra la base de datos</h2>
<img src=\"images/error.gif\" alt=\"error\"/>
<br /><br />
Comprueba los el archivo db.php y la conectividad del servidor de postgresql.
</body></html>
");

//footer
define("REAL_IPHONE","Se ve mejor en un iPhone de verdad.");

?>