<style>
  .offers-container {
    width: 100%;
    margin: 0 auto;
    padding: 20px;
  }

  .offers-header {
    margin-bottom: 20px;
  }

  .offer {
    background-color: #ff57223b;
    margin-bottom: 20px;
    border-radius: 4px 40px 4px 4px;
    border: 1px solid #eee;
    border-top: none;
  }

  .offer-header {
    display: flex;
    align-items: center;
    background-color: #ff572200;
    padding: 20px;
    border-radius: inherit;
  }

  .offer-header .badge {
    margin-right: 10px;
    background-color: #FF5722;
    border: 2px solid transparent;
    border-radius: 4px;
    color: #fff;
  }

  .offer-details {
    display: flex;
    justify-content: space-between;
    width: 100%;
  }

  .offer-details>div {
    margin-right: 10px;
  }

  .offer-body {
    display: flex;
    align-items: center;
    padding: 20px;
    background-color: #FFFFFF;
  }

  .offer-images {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-right: 10px;
    border-right: 2px solid #eee;
    padding-right: 10px;
  }

  .offer-image {
    height: 170px;
    width: 100%;
    max-width: 290px;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
  }

  .thumbnail {
    margin-bottom: 10px;
  }

  .offer-description {
    flex-grow: 1;
  }

  .offer-image {
    justify-content: flex-start !important;
    align-items: center !important;
    padding-left: 0 !important;
  }

  .offer-description a {
    background-color: #FF5722;
    border: 2px solid transparent;
    border-radius: 4px;
    color: #FFFFFF;
  }

  .card-ofertas-destaque {
    width: 23%;
    padding: 10px;

    border: 1px solid #eee;
    border-radius: 5px;
  }

  @media screen and (max-width: 1024px) {

    .offer-header,
    .offer-details,
    .offer-body {
      flex-direction: column;
    }

    .offer-images,
    .offer-description {
      width: 100%;
      border-right: none;
    }

    .card-ofertas-destaque {
      width: 45%;
    }
  }

  /* Estilo para dispositivos móveis (até 767px de largura) */
  @media only screen and (max-width: 767px) {
    .td-descrition {
      border: none;
      border-bottom: 1px solid var(--tmr-white);
      position: relative;
      padding-left: 0% !important;
      padding-top: 0px !important;
      display: block !important;
      white-space: normal;
      /* justify-content: flex-end; */
    }

    .offer-image {
      justify-content: flex-start !important;
      align-items: center !important;
      padding-left: 0 !important;
    }

    .card-ofertas-destaque {
      width: 100%;
    }
  }

  @media screen and (max-width: 575px) {
    .offer-images {
      overflow-x: scroll;
    }

    .thumbnail {
      width: 250px !important;
      height: auto !important;
    }
  }
</style>
<?php

/**
 * 
 * Ofertas
 * **/


if ($offers) { ?>
  <div class="mt-0" id="ofertas">
    <div class="offers-container">
      <div class="offers-header">
        <h5 class="mb-0 text-left text-info">
          <small><b>
              <?= translateText('Abaixo estão algumas Ofertas de', 'pt') ?>
              <?= $site->title ?>
              .</b><br>
            <?= translateText('Quer comprar ou vender', 'pt') ?>
            <b>
              <?= $site->title ?>
            </b> ?
            <?= translateText('Podemos publicar sua oferta.', 'pt') ?>
          </small>
        </h5>
      </div>
      <?php if (count($offers) > 3) : ?>
        <div class="w-100 d-flex justify-content-between d-none flex-column flex-md-row flex-wrap">
          <?php foreach ($offers as $offer) : ?>
            <div class="card card-ofertas-destaque mb-4">
              <div class="d-flex align-items-center flex-column" style="gap: 10px">
                <div class="w-100 d-flex justify-content-center">
                  <div title="<?= $offer->tipo ?>" data-toggle="modal" data-target="#modal-offer-<?= $offer->id ?>" href="#" class="offer-image" style="cursor:pointer; background-image: url('<?= $url . '/upload/fotos/' . $offer->fotos[0] . '_thumb.png' ?>')"></div>
                </div>
                <hr class="w-100 my-1">
                <div class="w-100">
                  <div class="card-body p-0">
                    <span class="badge badge-primary" style="<?= $offer->tipo_oferta[0] == "Venda" ? "background: #FF5722; border-radius: 4px " : "background: #033; border-radius: 4px" ?>"><?= translateText($offer->tipo_oferta[0], 'pt') ?></span>
                    <h6 class="mb-1" style="font-size: 14px"><strong>Tipo:</strong> <?= $offer->tipo ?> </h6>
                    <h6 class="mb-1" style="font-size: 14px"><strong>Quantidade:</strong><?= $offer->quantidade ?> </h6>
                    <h6 class="mb-1" style="font-size: 14px"><strong>Localidade:</strong> <?= $offer->cidade ?>/<?= $offer->estado ?> </h6>
                    <a data-toggle="modal" data-target="#modal-offer-<?= $offer->id ?>" href="#" class="mt-2 btn btn-sm text-white" style="<?= $offer->tipo_oferta[0] == 'Venda' ? 'background:#FF5722; width: 100% ' : 'background: rgb(0, 51, 51); width: 100%'; ?>">Detalhes da oferta</a>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php else : ?>
        <?php foreach ($offers as $offer) : ?>
          <div class="offer">
            <div class="offer-header" style="<?= $offer->tipo_oferta[0] == "Compra" ? "background:#3addb487 " : "" ?>">
              <span class="badge <?= $offer->tipo_oferta[1] ?>" style="<?= $offer->tipo_oferta[0] == "Compra" ? "background:#033 " : "" ?>">
                <?= translateText($offer->tipo_oferta[0], 'pt') ?>
              </span>
              <div class="offer-details">
                <div class="offer-type">
                  <?= translateText('Tipo', 'pt') ?>: <strong><?= $offer->tipo ?></strong>
                </div>
                <div class="offer-quantity">
                  <?= translateText('Quantidade', 'pt') ?>: <strong><?= $offer->quantidade ?></strong>
                </div>
                <div class="offer-location">
                  <?= translateText('Localidade', 'pt') ?>: <strong><?= $offer->cidade ?>/<?= $offer->estado ?></strong>
                </div>
              </div>
            </div>

            <div class="offer-body">
              <div class="offer-images">
                <?php
                $cont = 0;
                if ($offer->fotos) {
                  foreach ($offer->fotos as $foto) {
                    $cont++;
                    if ($cont <= 3) {
                ?>
                      <a href="#" data-toggle="modal" data-target="#modal-offer-<?= $offer->id ?>">
                        <img class="thumbnail" style="<?= $cont == 1 ? 'height: 180px; width: 180px;' : 'height: 120px; width: 120px;' ?>" src="<?= $url . '/upload/fotos/' . $foto . '_thumb.png' ?>" alt="Sua Imagem">
                      </a>
                    <?php
                    }
                  }
                }
                if ($offer->videos) {
                  foreach ($offer->videos as $video) {
                    if ($cont <= 3) {
                    ?>
                      <a href="#" data-toggle="modal" data-target="#modal-offer-<?= $offer->id ?>">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLPN6XtCmUFg-DypEGjliuL-FgZG03Mbxc_Q&usqp=CAU" width="60px" height="auto" style="border: 2px solid transparent; border-radius: 4px !important;" loading="lazy">
                      </a>
                <?php
                    }
                  }
                }
                ?>
              </div>
              <div class="offer-description">
                <p>
                  <a href="#" data-toggle="modal" data-target="#modal-offer-<?= $offer->id ?>" class="btn btn-sm" style="<?= $offer->tipo_oferta[0] == "Compra" ? "background:#033 " : "" ?>">
                    <?= translateText('Detalhes da oferta', 'pt') ?>
                  </a>
                </p>
                <p class="py-2" style="border-top: 2px solid rgba(0,0,0,0.1) "><small><?= nl2br($offer->obs) ?></small></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>

  <hr>
  <h4> </h4>
  <?php foreach ($offers as $offer) : ?>
    <?php $id = rand(); ?>
    <?php include 'modal-oferta.php'; ?>
  <?php endforeach; ?>
<?php } ?>