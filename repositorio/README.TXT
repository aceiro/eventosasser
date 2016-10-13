//
//
//          COMO USAR
//

Repositorio é um padrão de projeto (Design Patterns) que visa separar a camada de acesso à dados,
do restante da app.
Para isso, são necessárias algumas classes e interfaces
--> Facade (lê-se, Façade, de Fachada)
--> Modelos
--> Interfaces
--> Repositório

A arquitetura aqui, foi inspirada no link <https://code.tutsplus.com/tutorials/the-repository-design-pattern--net-35804>
Além disso, a estrutura de acesso à dados (DataMapper e ProxyAccess) foi pensada em um modelo ORM. Para facilitar a
construção do mecanismo de ORM, foi usada a API (RedBean) <http://redbeanphp.com/>

Para iniciar a criação de um novo modelo, é necessário criar a respectiva classe, por exemplo:
1. TipoAtividade.php

        class TipoAtividade extends BaseDataTransferObject{
            public $descricao;

            public function __construct($id, $descricao){
                $this->id=$id;
                $this->descricao = $descricao;
            }


        }

2. Veja, a relação de herança do modelo para BaseDataTransferObject (isso é usado para generalizar as interfaces)

        Não é necessário alterar essa classe !

3. Criar um repositório, TipoAtividadeRepository

        class TipoAtividadeRepository implements GenericRepository{
            protected $db;
            public function __construct(Database $db){
                $this->db = $db;
            }
            ..
            ..

            Confira o exemplo TipoAtividadeRepository.php

4. Adicionar uma entrada no facade,

            class EventosAsserFacade
            {

                public static function createTipoAtividadeRepository(){
                    $db = (new TipoAtividadeRepository(new Database()));
                    return $db;
                }
                ...
                ...

                Confira o exemplo, EventosAsserFacade.php

5. Usar,

            Para usar o repositorio, é necessário apenas instanciar o Façade

            ...
            ...

            $dto = new TipoAtividade(1, "Teste");
            $repository = EventosAsserFacade::createTipoAtividadeRepository();
            $repository->save($dto);

            ...
            ...

