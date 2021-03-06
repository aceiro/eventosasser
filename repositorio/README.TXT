//
//
//          COMO USAR
//

Repositorio � um padr�o de projeto (Design Patterns) que visa separar a camada de acesso � dados,
do restante da app.
Para isso, s�o necess�rias algumas classes e interfaces
--> Facade (l�-se, Fa�ade, de Fachada)
--> Modelos
--> Interfaces
--> Reposit�rio

A arquitetura aqui, foi inspirada no link <https://code.tutsplus.com/tutorials/the-repository-design-pattern--net-35804>
Al�m disso, a estrutura de acesso � dados (DataMapper e ProxyAccess) foi pensada em um modelo ORM. Para facilitar a
constru��o do mecanismo de ORM, foi usada a API (RedBean) <http://redbeanphp.com/>

Para iniciar a cria��o de um novo modelo, � necess�rio criar a respectiva classe, por exemplo:
1. TipoAtividade.php

        class TipoAtividade extends BaseDataTransferObject{
            public $descricao;

            public function __construct($id, $descricao){
                $this->id=$id;
                $this->descricao = $descricao;
            }


        }

2. Veja, a rela��o de heran�a do modelo para BaseDataTransferObject (isso � usado para generalizar as interfaces)

        N�o � necess�rio alterar essa classe !

3. Criar um reposit�rio, TipoAtividadeRepository

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

            Para usar o repositorio, � necess�rio apenas instanciar o Fa�ade

            ...
            ...

            $dto = new TipoAtividade(1, "Teste");
            $repository = EventosAsserFacade::createTipoAtividadeRepository();
            $repository->save($dto);

            ...
            ...

