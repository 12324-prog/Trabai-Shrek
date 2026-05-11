O seguinte projeto foi fruto de um trabaho exigido pelo docente de Programação WEB. O mesmo tem o objetivo de simular um ambiente cujo desenvolvedores precisam trabalhar em equipe, a fim de produzir um site de cadastro para um restaurante e trabalhar os seguintes pontos:
- Versionamento de projetos (GitHub).
- Organização e segurança em projetos complexos (Laravel).
- Produção de um banco de dados e triggers (MySQL).
- Satisfação do usuário (UI/UX).

Na produção deste projeto, foram priorizadas as seguintes variáveis:
- Funcionalidades e automação do banco de dados.
- Simplicidade e acessibilidade.

Implementações a serem aplicadas na faze de manutenção:
- Padronização e simplificação dos metodos de cadastro.
- Paginação e adição de barras de pesquisa aos relatórios.

## Como acessar localmente:
Para inicializar, será necessário baixar e instalar o <a href="https://sourceforge.net/projects/xampp">XAMPP</a>, o <a href="https://getcomposer.org/download/">Composer</a> e o <a href="https://code.visualstudio.com/">VsCode</a>

1. Mova o repositório, já extraido, para a pasta ```htdocs``` no disco onde baixou o XAMPP: <br>
``` C:\xampp\htdocs ```

2. Abra o XAMPP e ative o ```Apache``` e o ```MySQL```:
<p align= "center">
  <img width="663" height="426" alt="image" src="https://github.com/user-attachments/assets/08959f9b-7fdc-454b-9e83-09abb19af2dc" />
</p>

> [!CAUTION]
> **Observação:** Caso ocorra o erro ```Error: MySQL shutdown unexpectedly```. Siga os passos abaixo:
> 1. Pare o XAMPP completamente.
> 
> 3. Abra a pasta ```C:\xampp\mysql\data```.
> 4. Renomeie a pasta data para ```data_old```. Crie uma nova pasta chamada ```data```.
> 5. Copie o conteúdo da pasta ```backup``` (localizada em ```xampp/mysql/```) e cola na nova pasta ```data```.
> 6. Caso tenha algum banco de dados, copie eles da pasta ```data_old``` para a nova pasta ```data```. não copie as pastas ```mysql```, ```performance_schema```, ou ```phpmyadmin```.
> 7. Copie o arquivo ```ibdata1``` da pasta ```data_old``` para a nova ```data```, substituindo o existente. <br>
> **Importante:** Apagar este arquivo pode resultar na perda de seus dados.

3. No MySQL, clique em ```Admin```.

5. Vá na aba ```SQL``` -> digite ```CREATE DATABASE podraoshrek;``` -> clique em ```Executar```.
<p align= "center">
  <img width="1671" height="634" alt="Cria BD" src="https://github.com/user-attachments/assets/b321d1ec-8e9b-4f9f-ad36-3007978a71c0" />
</p>

6. Faça o mesmo com o código no arquivo ```DB.sql```, depois com ```TriggersDEFINITIVO.txt```.

7. Abra o projeto no VsCode ```C:\xampp\htdocs\Trabai-Shrek-backendCauan\projeto```.

8. Acesse o terminal com o atalho ```Ctrl+Shift+'``` e digite ```php artisan serve```.


<p align= "center">
  <img width="1919" height="1079" alt="Captura de tela 2026-05-11 105040" src="https://github.com/user-attachments/assets/c16c055c-5ec2-4216-b5fe-497c67107ff9" />
</p>
