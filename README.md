To run the application apiphp:

-- install xampp
-- install composer
-- install slimphp

paste the project folder into: c:\xampp\htdocs\
in xampp-control, initialize the apache and the mySQL

-- install the restEasy app on google chrome, for testing the simple backend api


-- In the field URL type:: http://localhost/apiphp/public/index.php/api/cliente/add
-- In "Headers" name: Content-Type Value: application/json
-- In "Body" insert customer data to be saved in the database, in the json standard {"field" : "key" , "field2": "key2"}

example: {"cpf":"1003085990","senha":"123000","nome":"Maria","telefone":"778098887","email":"maria@testel.com","nascimento":"1980-10-04","cep":"28000000","logradouro":"rua teste","num":"1","complemento":"casa fundos","bairro":"centro","cidade":"nova friburgo","estado":"RJ","rg":"1002000","expedicao":"2012-01-10","orgao_expeditor":"tttt","estado_civil":"solteira","categoria":"empregado","empresa":null,"profissao":"professor","renda_bruta":"000"}

BD table file in the pasta _sql
Photos of the program running in the img folder


