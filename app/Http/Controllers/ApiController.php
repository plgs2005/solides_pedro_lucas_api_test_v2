<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 *     title="Teste Prático Backend v2",
 *     version="1.0.0",
 *     description="
<div style='display: flex; justify-content: space-between;'>
  <div style='flex: 1; padding-right: 10px;'>
    <h3>Últimos Projetos:</h3>
    <ul>
      <li><strong>Projeto 1</strong>: Plataforma SaaS para agendamento de postagens em mídias sociais, utilizando Laravel, Docker e microserviços. O projeto incluiu integração com a API do TikTok e automação de tarefas.</li>
      <li><strong>Projeto 2</strong>: Assistente jurídico baseado em IA, capaz de analisar PDFs de processos judiciais e fornecer resumos e insights. Utilizou tecnologias como OpenAI GPT e integrações com bancos de dados jurídicos.</li>
      <li><strong>Projeto 3</strong>: Sistema de gerenciamento de vendas e assinaturas para produtores digitais, implementado com Laravel, Vue.js e API RESTful. Focado em alta performance e escalabilidade.</li>
    </ul>
  </div>
  <div style='flex: 1; padding-right: 10px;'>
    <h3>Desafios do Teste:</h3>
    <p>O teste foi relativamente simples, mas envolveu a implementação de práticas recomendadas de mercado para autenticação e documentação de APIs. A configuração do JWT, a criação de endpoints seguros e a documentação detalhada com Swagger foram os principais focos.</p>
  </div>
  <div style='flex: 1;'>
    <h3>Contato:</h3>
    <ul>
      <li><strong>Nome</strong>: Pedro Lucas Gandara Santos</li>
      <li><strong>Email</strong>: <a href='mailto:plgsantos@icloud.com'>plgsantos@icloud.com</a>, <a href='mailto:devlaravel@icloud.com'>devlaravel@icloud.com</a></li>
      <li><strong>Telefone</strong>: +55 11 95090-3204</li>
      <li><strong>GitHub</strong>: <a href='https://github.com/seu-usuario'>https://github.com/seu-usuario</a></li>
    </ul>
  </div>
</div>
"
 * )
 *
 * @OA\Server(
 *     url=L5_SWAGGER_CONST_HOST,
 *     description="Este é o servidor principal onde a API está hospedada. Utilize este endpoint para fazer chamadas às diversas rotas documentadas abaixo."
 * )
 *
 * @OA\Tag(
 *     name="Auth",
 *     description="Endpoints relacionados à autenticação"
 * )
 *
 * @OA\Tag(
 *     name="Records",
 *     description="Endpoints relacionados aos registros"
 * )
 */
class ApiController extends Controller
{
    // Este controlador pode ser utilizado para anotações gerais da API.
}
