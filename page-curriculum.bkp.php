<?php
/**
 * Exibe a página do currículo
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header('curriculum'); ?>

<!-- page-curriculum.php -->

<!--<div class="wrap">-->
	<div id="primary" class="content-area">
		<main id="main" class="page-curriculum" role="main">

			<article id="cv-panel1" <?php post_class( 'twentyseventeen-panel ' ); ?> >
				<div class="panel-image">
					<div class="panel-image-title panel-colours">

						<h2>Objetivos</h2>
						<h3><span>Em quais cargos estou preparado para trabalhar?</span></h3>
						<div class="wrap">
							<p class="grand box">Professor de física e de matemática da educação básica e de cursos pré-vestibular.
								Professor plantonista de física para ensino médio e cursos pré-vestibular ou matemática do ensino
								fundamental II.</p>
						</div>

					</div><!-- .panel-image-title -->
				</div><!-- .panel-image -->
			</article>

			<article id="cv-panel2" <?php post_class( 'twentyseventeen-panel ' ); ?> >
				<div class="panel-image">
					<div class="panel-image-title panel-colours">
						<h2>Formação</h2>
						<h3><span>+ habilidades <span class="ampersand-beauty">&amp;</span> outras competências</span></h3>

						<div class="pure-g wrap">
							<div class="pure-u-1 pure-u-md-3-5">
								<div class="l-box">
									<p class="grand box">
										<strong>Licenciatura em Física</strong> pela Universidade Estadual Paulista Júlio de Mesquita Filho, (FEG/UNESP), campus de Guaratinguetá, concluída em 2009.
									</p>
								</div>
							</div>
							<div class="pure-u-md-2-5">
								<div class="pure-u-1">
									<div class="l-box">
										<p class="grand box">Prática com utilização de novas tecnologias aplicadas à educação.</p>
										<p class="seemore hideme"><a href="#cv-panel4">ver projetos</a></p>
									</div>
								</div>
								<div class="pure-u-1">
									<div class="l-box">
										<p class="grand box">Programação voltada à web e design gráfico.</p>
									</div>
								</div>
							</div>
						</div>

					</div><!-- .panel-image-title -->
				</div><!-- .panel-image -->
			</article>

			<article id="cv-panel3" class="panel-content">
				<div class="wrap">
					<div class="panel-colours">

						<h2>Experiência profissional</h2>
						<h3><span>Por onde já passei</span></h3>

						<div class="entry-content">
							<div class="pure-g">
								<div class="pure-u-1 pure-u-md-1-2">
									<div class="l-box">
										<span class="cv-empresa"><strong>Colégio São João Gualberto</strong>, São Paulo</span>
										<span class="cv-periodo">Janeiro de 2013 – Atual</span>
										<span class="cv-descricao">Atualmente lecionando física no ensino médio e matemática e desenho geométrico no ensino fundamental, além de plantões de dúvidas para alunos dos ensinos fundamental e médio.</span>
									</div>
								</div>
								<div class="pure-u-1 pure-u-md-1-2">
									<div class="l-box">
										<span class="cv-empresa"><strong>Adaptativa Inteligência Educacional</strong>, São Paulo</span>
										<span class="cv-periodo">[Freelancer] Março de 2017 – Atual</span>
										<span class="cv-descricao">Trabalho com criação de questões inéditas de física e de matemática, estruturadas de acordo com modelo utilizado pelo ENEM e aplicadas em simulados para alunos de ensino médio e pré-vestibular em diversas instituições do país.</span>
									</div>
								</div>
								<div class="pure-u-1 pure-u-md-1-2">
									<div class="l-box">
										<span class="cv-empresa"><strong>Colégio Ipê</strong>, São Paulo</span>
										<span class="cv-periodo">Janeiro de 2012 – Fevereiro de 2016</span>
										<span class="cv-descricao">Trabalhei como professor de matemática do ensino fundamental II e, durante 1 semestre, como professor de informática do ensino fundamental I.</span>
									</div>
								</div>
								<div class="pure-u-1 pure-u-md-1-2">
									<div class="l-box">
										<span class="cv-empresa"><strong>4 Quatros Inteligência Educacional</strong>, São Paulo</span>
										<span class="cv-periodo">Março de 2011 – Janeiro de 2012</span>
										<span class="cv-descricao">Trabalhei como instrutor de cursos livres, desenvolvendo material didático próprio focado em preparação para ingresso no ensino superior. Oferecíamos resoluções em vídeo de questões de vestibulares e ENEM, propondo um plano de estudos baseado nas dificuldades do aluno.</span>
									</div>
								</div>
								<div class="pure-u-1 pure-u-md-1-2">
									<div class="l-box">
										<span class="cv-empresa"><strong>DAG Centro de Estudos</strong>, São Paulo</span>
										<span class="cv-periodo">Janeiro de 2011 – Dezembro de 2013</span>
										<span class="cv-descricao">Trabalhei como professor particular de física e de matemática, atendendo a alunos de ensinos fundamental e médio.</span>
									</div>
								</div>
								<div class="pure-u-1 pure-u-md-1-2">
									<div class="l-box">
										<span class="cv-empresa"><strong>Tutores Perdizes</strong>, São Paulo</span>
										<span class="cv-periodo">Junho de 2012 – Dezembro de 2013</span>
										<span class="cv-descricao">Trabalhei como professor particular de física e de matemática, atendendo a alunos de ensinos fundamental e médio.</span>
									</div>
								</div>
								<div class="pure-u-1 pure-u-md-1-2">
									<div class="l-box">
										<span class="cv-empresa"><strong>Colégio Dr. Alfredo Castro</strong>, São Paulo</span>
										<span class="cv-periodo">Maio de 2011 – Dezembro de 2012</span>
										<span class="cv-descricao">Ministrei aulas de física e de matemática para alunos do ensino fundamental II. No contraturno, realizava aulas de reforço de matemática e acompanhamento pedagógico individual para alunos com dificuldades de aprendizagem.</span>
									</div>
								</div>
								<div class="pure-u-1 pure-u-md-1-2">
									<div class="l-box">
										<span class="cv-empresa"><strong>Colégio São José</strong>, Taubaté</span>
										<span class="cv-periodo">Fevereiro de 2009 – Junho de 2009</span>
										<span class="cv-descricao">Lecionei física e química para alunos de ensino médio e ministrei aulas de ciências nas séries finais do ensino fundamental II.</span>
									</div>
								</div>
								<div class="pure-u-1 pure-u-md-1-2">
									<div class="l-box">
										<span class="cv-empresa"><strong>Colégio Anglo Cassiano Ricardo</strong>, São Paulo</span>
										<span class="cv-periodo">Março de 2008 – Dezembro de 2009</span>
										<span class="cv-descricao">Atuei como professor plantonista de física doensino médio e de curso pré-vestibular. Ministrei aulas de reforço e de revisão, trabalhei com correção de provas e atividades e, periodicamente, revisava simulados de vestibulares feitos pela instituição de ensino.</span>
									</div>
								</div>
							</div>
						</div><!-- .entry-content -->

					</div><!-- .panel-colours -->

				</div><!-- .wrap -->
			</article><!-- .panel-content -->

			<article id="cv-panel4" <?php post_class( 'twentyseventeen-panel ' ); ?> >
				<div class="panel-image">
					<div class="panel-image-title panel-colours">

						<h2>Projetos</h2>
						<div class="wrap">
							<h3><span>Durante minha atividade docente, em diferentes épocas e contextos, desenvolvi uma série
								de projetos com os alunos, buscando não somente uma aprendizagem mais efetiva como também maiores
								interação e identificação dos alunos com a escola.</span></h3>
						</div>

					</div><!-- .panel-image-title -->
				</div><!-- .panel-image -->
			</article>

			<article class="panel-content">
				<div class="pure-g">

					<div class="photo-box pure-u-1 pure-u-md-1-4">
	        	<img src="https://images.pexels.com/photos/634693/pexels-photo-634693.jpeg" alt="Iniciação tecnológica">
	        </div>

	        <div class="text-box pure-u-1 pure-u-md-1-4">
	          <div class="l-box">
	            <h4>Iniciação tecnológica</h1>
	            <p>Projetos de física aplicada, utilizando conceitos aprendidos em sala de aula</p>
	          </div>
	        </div>

					<div class="photo-box pure-u-1 pure-u-md-1-4">
						<img src="https://images.pexels.com/photos/216798/pexels-photo-216798.jpeg" alt="Gincanas de física">
	        </div>

					<div class="text-box pure-u-1 pure-u-md-1-4">
	          <div class="l-box">
	            <h4>Gincanas de física</h1>
	            <p>Atividades lúdicas de física, realizadas com grupos de alunos ao longo do ano letivo.</p>
	          </div>
	        </div>

					<div class="photo-box pure-u-1 pure-u-md-1-4">
						<img src="https://images.pexels.com/photos/635609/pexels-photo-635609.jpeg" alt="Khan Academy">
	        </div>

					<div class="text-box pure-u-1 pure-u-md-1-4">
						<div class="l-box">
							<h4>Khan Academy</h4>
							<p>Revisão de conceitos de matemática, personalizado de acordo com as dificuldades do aluno.</p>
						</div>
					</div>

					<div class="photo-box pure-u-1 pure-u-md-1-4">
						<img src="https://images.pexels.com/photos/1116558/pexels-photo-1116558.jpeg" alt="Monitoria estudantil">
	        </div>

					<div class="text-box pure-u-1 pure-u-md-1-4">
						<div class="l-box">
							<h4>Monitoria estudantil</h4>
							<p>Plantões de dúvidas e grupos de estudos, realizados por e para alunos do ensino médio.</p>
						</div>
					</div>

					<div class="photo-box pure-u-1 pure-u-md-1-4">
						<img src="https://images.pexels.com/photos/1116302/pexels-photo-1116302.jpeg" alt="Grêmio estudantil">
	        </div>

					<div class="text-box pure-u-1 pure-u-md-1-4">
						<div class="l-box">
							<h4>Grêmio estudantil</h4>
							<p>Grupo de alunos, escolhidos pela turma, para representação de interesses estudantis.</p>
						</div>
					</div>

					<div class="photo-box pure-u-1 pure-u-md-1-4">
						<img src="https://images.pexels.com/photos/2814/bike-bicycle-garage.jpg" alt="Produção discente de material">
	        </div>

					<div class="text-box pure-u-1 pure-u-md-1-4">
						<div class="l-box">
							<h4>Produção discente de material</h4>
							<p>Produção coletiva de conteúdo educativo realizada por alunos de ensino médio para a internet.</p>
						</div>
					</div>

					<div class="photo-box pure-u-1 pure-u-md-1-6">
						<img src="https://images.pexels.com/photos/89699/pexels-photo-89699.jpeg" alt="Sarau cultural">
	        </div>

					<div class="text-box pure-u-1 pure-u-md-1-6">
						<div class="l-box">
							<h4>Sarau cultural</h4>
							<p>Atividade cultural e multidisciplinar, promovendo manifestações de saberes variados.</p>
						</div>
					</div>

					<div class="photo-box pure-u-1 pure-u-md-1-6">
						<img src="https://images.pexels.com/photos/374811/pexels-photo-374811.jpeg" alt="Videoaulas">
	        </div>

					<div class="text-box pure-u-1 pure-u-md-1-6">
						<div class="l-box">
							<h4>Videoaulas</h4>
							<p>Gravadas pelo professor e utilizadas em momentos distintos da sequência didática.</p>
						</div>
					</div>

					<div class="photo-box pure-u-1 pure-u-md-1-6">
						<img src="https://images.pexels.com/photos/940365/pexels-photo-940365.jpeg" alt="Podcast">
	        </div>

					<div class="text-box pure-u-1 pure-u-md-1-6">
						<div class="l-box">
							<h4>Podcast</h4>
							<p>Programa em áudio distribuído pela internet focado em partilhar vivências de educação e ensino.</p>
						</div>
					</div>

				</div>
			</article>

			<article id="cv-panel5" <?php post_class( 'twentyseventeen-panel ' ); ?> >
				<div class="panel-image">
					<div class="panel-image-title panel-colours">

						<h2>Obrigado pela atenção!</h2>
						<div class="wrap">
							<p class="seemore"><a href="mailto:contato@pedrobittencourt.com.br">Vamos entrar em contato?</a></p>
						</div>

					</div><!-- .panel-image-title -->
				</div><!-- .panel-image -->
			</article>


		</main><!-- #main -->
	</div><!-- #primary -->
<!--</div><!-- .wrap -->

<?php get_footer('curriculum'); ?>
