<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    

    <?php $this->load->view('shared/cabecalho'); ?>

    <body>
      
      <?php $this->load->view('shared/headeri'); ?>

      <div class="jumbotron customBg hidden-xs">
        <div class="container custom-container">
          <div class="carousel slide" id="jumbotron" data-ride="carousel">
            <div class="carousel-inner">
              <div class="item active">
                <img src="{base_url}assets/img/banner1.png" alt="" class="img-responsive">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                      <a href="javascript:void(0);">
                        <div class="desc">
                          <h3>One Direction</h3>
                          <p>
                            Concorra à uma vaga de SCRUM Master na Maná WEB.
                          </p>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
              <a class="controls left" href="#jumbotron" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="controls right" href="#jumbotron" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Corpo do site -->
      <div class="container corpo text-center">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="ouca-ao-vivo">
              <div class="arrow-ao-vivo">
                <span class="direita"></span>
                <p>OU&Ccedil;A AO VIVO</p>
              </div>
              <div class="private-content hidden-xs">
                <p>clique e ouça ao vivo | <span class="no-ar online">NO AR</span><button type="button" class="no-ar online pull-right">+</button></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <img src="{base_url}assets/img/noticias_jornal.png" class="img-responsive">
          </div>
        </div>
        <div class="row hidden-xs banner-propaganda">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="retangulo-conteudo">
              <img src="{base_url}assets/img/banner_bradesco.png" class="img-responsive">
            </div>
          </div>
        </div>
        <div class="row fotos-videos">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <ul class="nav nav-tabs borderLessRadius">
              <li class="active fotos"><a href="#fotos" data-toggle="tab" class="padding-menu">Fotos</a></li>
              <li class="videos"><a href="#videos" data-toggle="tab" class="padding-menu">Vídeos</a></li>
            </ul>
            <button type="button" class="no-ar online pull-right">+</button>
            <div class="retangulo-conteudo">
              <div class="tab-content">
                <div class="tab-pane active" id="fotos">
                  <div class="carousel slide" data-ride="slide" id="slide-fotos">
                    <div class="carousel-inner">
                      <ul class="list-unstyled fotos item active">
                        <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <img src="{base_url}assets/img/mlkdoido.png" alt="Cantor loko memo">
                        </li>
                         <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <img src="{base_url}assets/img/mlkdoido.png" alt="Cantor loko memo">
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <img src="{base_url}assets/img/mlkdoido.png" alt="Cantor loko memo">
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <img src="{base_url}assets/img/mlkdoido.png" alt="Cantor loko memo">
                        </li>
                      </ul>
                      <ul class="list-unstyled fotos item">
                        <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <img src="{base_url}assets/img/mlkdoido.png" alt="Cantor loko memo">
                        </li>
                         <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <img src="{base_url}assets/img/mlkdoido.png" alt="Cantor loko memo">
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <img src="{base_url}assets/img/mlkdoido.png" alt="Cantor loko memo">
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <img src="{base_url}assets/img/mlkdoido.png" alt="Cantor loko memo">
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-11 col-md-11 col-sm-11 col-xs-9" style="min-height: 50px;"></div>
                  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-3">
                    <div class="pull-right">
                      <a class="controls left" href="#slide-fotos" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                      </a>
                      <a class="controls right" href="#slide-fotos" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="videos">
                  <div class="carousel slide" data-ride="slide" id="slide-videos">
                    <div class="carousel-inner">
                      <ul class="list-unstyled videos item active">
                        <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <iframe src="http://www.youtube.com/embed/Pn-6eOxnEMI" frameborder="0" allowfullscreen></iframe>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <iframe src="http://www.youtube.com/embed/Pn-6eOxnEMI" frameborder="0" allowfullscreen></iframe>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <iframe src="http://www.youtube.com/embed/Pn-6eOxnEMI" frameborder="0" allowfullscreen></iframe>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <iframe src="http://www.youtube.com/embed/Pn-6eOxnEMI" frameborder="0" allowfullscreen></iframe>
                        </li>
                      </ul>
                      <ul class="list-unstyled videos item">
                        <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <iframe src="http://www.youtube.com/embed/Pn-6eOxnEMI" frameborder="0" allowfullscreen></iframe>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <iframe src="http://www.youtube.com/embed/Pn-6eOxnEMI" frameborder="0" allowfullscreen></iframe>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <iframe src="http://www.youtube.com/embed/Pn-6eOxnEMI" frameborder="0" allowfullscreen></iframe>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <iframe src="http://www.youtube.com/embed/Pn-6eOxnEMI" frameborder="0" allowfullscreen></iframe>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-11 col-md-11 col-sm-11 col-xs-9" style="min-height: 50px;"></div>
                  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-3">
                    <div class="pull-right">
                      <a class="controls left" href="#slide-videos" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                      </a>
                      <a class="controls right" href="#slide-videos" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row fale-aqui">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="tabs padding-menu fale-aqui"><a href="javascript:void(0);" title="Fale aqui">Fale Aqui</a></h3>
            <div class="retangulo-conteudo">
              <div class="row hidden-xs">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 img-internauta">
                  <img src="{base_url}assets/img/internauta.png" class="img-responsive">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 msg-internauta">
                  <h2>GABRIELA RODRIGUES FIRME</h2>
                  <span>Para: 101fm</span>
                  <p>Boa tarde a todos os macacos da manáweb.com.br</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
                  <ul class="pagination borderLessRadius">
                    <li><a href="#">01</a></li>
                    <li><a href="#">02</a></li>
                    <li><a href="#">03</a></li>
                    <li><a href="#">04</a></li>
                    <li><a href="#">05</a></li>
                    <li><a href="#">06</a></li>
                    <li><a href="#">07</a></li>
                    <li><a href="#">08</a></li>
                    <li><a href="#">09</a></li>
                    <li><a href="#">10</a></li>
                    <li><a href="#"><span class="min">+</span></a></li>
                  </ul>
                </div>
              </div>
              <div class="visible-xs">
                <div class="row">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 img-internauta">
                    <img src="{base_url}assets/img/internauta.png" class="img-responsive">
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 msg-internauta">
                    <h2>GABRIELA RODRIGUES FIRME</h2>
                    <span>Para: 101fm</span>
                    <p>Boa tarde a todos os macacos da manáweb.com.br</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
                    <ul class="pagination borderLessRadius">
                      <li><a href="javascript:void(0);">01</a></li>
                      <li><a href="javascript:void(0);">02</a></li>
                      <li><a href="javascript:void(0);">03</a></li>
                      <li><a href="javascript:void(0);">04</a></li>
                      <li><a href="javascript:void(0);">05</a></li>
                      <li><a href="javascript:void(0);">06</a></li>
                      <li><a href="javascript:void(0);">07</a></li>
                      <li><a href="javascript:void(0);">08</a></li>
                      <li><a href="javascript:void(0);">09</a></li>
                      <li><a href="javascript:void(0);">10</a></li>
                      <li><a href="javascript:void(0);"><span class="min">+</span></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <button class="btn btn-primary btn-md borderLessRadius min pull-left"><span class="glyphicon glyphicon-comment"></span><span>Envie você também seu recado</span></button>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <a href="javascript:void(0);" title="Facebook">
              <div class="redesMetro facebook">
                <span></span>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 item">
            <a href="javascript:void(0);" title="Twitter">
              <div class="redesMetro twitter">
                <span></span>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 item">
            <a href="javascript:void(0);" title="Instagram">
              <div class="redesMetro instagram">
                <span></span>
              </div>
            </a>
          </div>
        </div>
        <div class="row top10">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="tabs padding-menu top10"><a href="javascript:void(0);" title="TOP 10">TOP 10</a></h3>
            <div class="row text-left">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="item">
                  <span class="position pull-left">
                    <strong>01</strong>
                  </span>
                  <img src="{base_url}assets/img/beyonce.png" alt="Beyoncé">
                  <div class="msg-top10">
                    <h3>XO</h3>
                    <div>
                      <span class="glyphicon glyphicon-chevron-right min pull-left"></span>
                      <span>Beyoncé</span>
                    </div>
                  </div>
                  <div class="pull-right">
                    <a href="javascript:void(0);" title="Ouvir esta música">
                      <button type="button" class="pull-left">
                        <span class="glyphicon glyphicon-play"></span>
                      </button>
                      <div class="informativo text-center">
                        <span>OUVIR</span>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="item">
                  <span class="position pull-left">
                    <strong>02</strong>
                  </span>
                  <img src="{base_url}assets/img/beyonce.png" alt="Beyoncé">
                  <div class="msg-top10">
                    <h3>XO</h3>
                    <div>
                      <span class="glyphicon glyphicon-chevron-right min pull-left"></span>
                      <span>Beyoncé</span>
                    </div>
                  </div>
                  <div class="pull-right">
                    <a href="javascript:void(0);" title="Ouvir esta música">
                      <button type="button" class="pull-left">
                        <span class="glyphicon glyphicon-play"></span>
                      </button>
                      <div class="informativo text-center">
                        <span>OUVIR</span>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="item">
                  <span class="position pull-left">
                    <strong>03</strong>
                  </span>
                  <img src="{base_url}assets/img/beyonce.png" alt="Beyoncé">
                  <div class="msg-top10">
                    <h3>XO</h3>
                    <div>
                      <span class="glyphicon glyphicon-chevron-right min pull-left"></span>
                      <span>Beyoncé</span>
                    </div>
                  </div>
                  <div class="pull-right">
                    <a href="javascript:void(0);" title="Ouvir esta música">
                      <button type="button" class="pull-left">
                        <span class="glyphicon glyphicon-play"></span>
                      </button>
                      <div class="informativo text-center">
                        <span>OUVIR</span>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="item">
                  <span class="position pull-left">
                    <strong>04</strong>
                  </span>
                  <img src="{base_url}assets/img/beyonce.png" alt="Beyoncé">
                  <div class="msg-top10">
                    <h3>XO</h3>
                    <div>
                      <span class="glyphicon glyphicon-chevron-right min pull-left"></span>
                      <span>Beyoncé</span>
                    </div>
                  </div>
                  <div class="pull-right">
                    <a href="javascript:void(0);" title="Ouvir esta música">
                      <button type="button" class="pull-left">
                        <span class="glyphicon glyphicon-play"></span>
                      </button>
                      <div class="informativo text-center">
                        <span>OUVIR</span>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="item">
                  <span class="position pull-left">
                    <strong>05</strong>
                  </span>
                  <img src="{base_url}assets/img/beyonce.png" alt="Beyoncé">
                  <div class="msg-top10">
                    <h3>XO</h3>
                    <div>
                      <span class="glyphicon glyphicon-chevron-right min pull-left"></span>
                      <span>Beyoncé</span>
                    </div>
                  </div>
                  <div class="pull-right">
                    <a href="javascript:void(0);" title="Ouvir esta música">
                      <button type="button" class="pull-left">
                        <span class="glyphicon glyphicon-play"></span>
                      </button>
                      <div class="informativo text-center">
                        <span>OUVIR</span>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              <div class="clearfix col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="item">
                  <span class="position pull-left">
                    <strong>06</strong>
                  </span>
                  <img src="{base_url}assets/img/beyonce.png" alt="Beyoncé">
                  <div class="msg-top10">
                    <h3>XO</h3>
                    <div>
                      <span class="glyphicon glyphicon-chevron-right min pull-left"></span>
                      <span>Beyoncé</span>
                    </div>
                  </div>
                  <div class="pull-right">
                    <a href="javascript:void(0);" title="Ouvir esta música">
                      <button type="button" class="pull-left">
                        <span class="glyphicon glyphicon-play"></span>
                      </button>
                      <div class="informativo text-center">
                        <span>OUVIR</span>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="item">
                  <span class="position pull-left">
                    <strong>07</strong>
                  </span>
                  <img src="{base_url}assets/img/beyonce.png" alt="Beyoncé">
                  <div class="msg-top10">
                    <h3>XO</h3>
                    <div>
                      <span class="glyphicon glyphicon-chevron-right min pull-left"></span>
                      <span>Beyoncé</span>
                    </div>
                  </div>
                  <div class="pull-right">
                    <a href="javascript:void(0);" title="Ouvir esta música">
                      <button type="button" class="pull-left">
                        <span class="glyphicon glyphicon-play"></span>
                      </button>
                      <div class="informativo text-center">
                        <span>OUVIR</span>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="item">
                  <span class="position pull-left">
                    <strong>08</strong>
                  </span>
                  <img src="{base_url}assets/img/beyonce.png" alt="Beyoncé">
                  <div class="msg-top10">
                    <h3>XO</h3>
                    <div>
                      <span class="glyphicon glyphicon-chevron-right min pull-left"></span>
                      <span>Beyoncé</span>
                    </div>
                  </div>
                  <div class="pull-right">
                    <a href="javascript:void(0);" title="Ouvir esta música">
                      <button type="button" class="pull-left">
                        <span class="glyphicon glyphicon-play"></span>
                      </button>
                      <div class="informativo text-center">
                        <span>OUVIR</span>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="item">
                  <span class="position pull-left">
                    <strong>09</strong>
                  </span>
                  <img src="{base_url}assets/img/beyonce.png" alt="Beyoncé">
                  <div class="msg-top10">
                    <h3>XO</h3>
                    <div>
                      <span class="glyphicon glyphicon-chevron-right min pull-left"></span>
                      <span>Beyoncé</span>
                    </div>
                  </div>
                  <div class="pull-right">
                    <a href="javascript:void(0);" title="Ouvir esta música">
                      <button type="button" class="pull-left">
                        <span class="glyphicon glyphicon-play"></span>
                      </button>
                      <div class="informativo text-center">
                        <span>OUVIR</span>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="item">
                  <span class="position pull-left">
                    <strong>10</strong>
                  </span>
                  <img src="{base_url}assets/img/beyonce.png" alt="Beyoncé">
                  <div class="msg-top10">
                    <h3>XO</h3>
                    <div>
                      <span class="glyphicon glyphicon-chevron-right min pull-left"></span>
                      <span>Beyoncé</span>
                    </div>
                  </div>
                  <div class="pull-right">
                    <a href="javascript:void(0);" title="Ouvir esta música">
                      <button type="button" class="pull-left">
                        <span class="glyphicon glyphicon-play"></span>
                      </button>
                      <div class="informativo text-center">
                        <span>OUVIR</span>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row fale-conosco">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3 class="tabs padding-menu"><a href="javascript:void(0);" title="Fale Conosco">Fale Conosco</a></h3>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="col-lg-2 col-lg-offset-0 col-md-2 col-md-offset-0 col-sm-2 col-sm-offset-0 col-xs-12 col-xs-offset-0">
                  <a href="javascript:void(0);">
                    <div class="end-tel-mail circle">
                      <div class="icones-end-tel-mail end container"></div>
                    </div>
                  </a>
                  <div class="visible-xs visible-sm">
                    <h2>Endereço</h2>
                    <address>R. Mário Guarita Cartaxo , N° 123 - Jd Paulista Cep: - 14875-325 - Jaboticabal - SP</address>
                  </div>
                </div>
                <div class="col-lg-2 col-lg-offset-3 col-md-2 col-md-offset-3 col-sm-2 col-sm-offset-2 col-xs-12 col-xs-offset-0">
                  <a href="javascript:void(0);">
                    <div class="end-tel-mail circle">
                      <div class="icones-end-tel-mail tel container"></div>
                    </div>
                  </a>
                  <div class="visible-xs visible-sm">
                    <h2>Telefone</h2>
                    <p>(16) 3203-2277</p>
                  </div>
                </div>
                <div class="col-lg-2 col-lg-offset-3 col-md-2 col-md-offset-3 col-sm-2 col-sm-offset-2 col-xs-12 col-xs-offset-0">
                  <a href="javascript:void(0);">
                    <div class="end-tel-mail circle">
                      <div class="icones-end-tel-mail mail container"></div>
                    </div>
                  </a>
                  <div class="visible-xs visible-sm">
                    <h2>E-mail</h2>
                    <p><a href="mailto:contato@101fm.com.br">contato@101fm.com.br</a></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <iframe width="80%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" class="hidden-sm hidden-xs" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=Rua.+M%C3%A1rio+Guarita+Cartaxo,+N%C2%B0+123+-+Jaboticabal&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=61.323728,135.263672&amp;ie=UTF8&amp;hq=Rua.+M%C3%A1rio+Guarita+Cartaxo,+N%C2%B0+123+-+Jaboticabal&amp;hnear=&amp;radius=15000&amp;ll=-21.255796,-48.339575&amp;spn=0.008969,0.016512&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=7316770744456930095&amp;output=embed"></iframe>
              </div>
            </div>
            <div class="row text-center conteudo hidden-xs hidden-sm">
              <div class="col-lg-2 col-sm-3">
                <h2>Endereço</h2>
                <address>R. Mário Guarita Cartaxo, N° 123 - Jd Paulista Cep: - 14875-325 - Jaboticabal - SP</address>
              </div>
              <div class="col-lg-2 col-sm-3">
                <h2>Telefone</h2>
                <p>(16) 3203-2277</p>
              </div>
              <div class="col-lg-2 col-sm-3">
                <h2>E-mail</h2>
                <p><a href="mailto:contato@101fm.com.br">contato@101fm.com.br</a></p>
              </div>
            </div>
            <form class="form borderLessRadius">
              <div class="row">
                <div class="form-group">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="txtNome" id="txtNome" class="form-control" placeholder="Nome" required>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <input type="tel" name="numFone" id="numFone" class="form-control" placeholder="Telefone" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <input type="email" name="txtEmail" id="txtEmail" class="form-control" placeholder="E-mail" required>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="txtAssunto" id="txtAssunto" class="form-control" placeholder="Assunto" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <textarea name="txtMsg" id="txtMsg" class="form-control" placeholder="Mensagem" required></textarea>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-default btn-lg pull-right">Enviar</button>
            </form>
          </div>
        </div>
      </div>

      <?php $this->load->view('shared/footeri'); ?>

    </div>

    </body>
</html>