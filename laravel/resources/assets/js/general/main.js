var ajax = new Ajax('GET','/getroles','json');
ajax.getRoles();

var ajax_2 = new Ajax('GET','/administration/getoffices','json');
ajax_2.getOffices();