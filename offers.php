
<style>
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
}

 .offer-image {			justify-content: flex-start !important;
			align-items: center !important;
			padding-left: 0 !important;
}
</style>
<?php 

 /**
 * 
 * Ofertas
 * **/


if ($offers) { ?>
		<div class="mt-0" id="ofertas">
		  <table class="table table-mobile-responsive table-mobile-responsive table-mobile-sided">
		  <tbody>
		  </tbody>
          <thead>
            <tr>
              <th width="411" colspan="6"> <h5 class="mb-0 text-left text-info"><small><b>
                <?= translateText('Abaixo estão algumas Ofertas de', 'pt') ?>
                <?= $site->title ?>
                .</b><br>
                <?= translateText('Quer comprar ou vender', 'pt') ?>
                <b>
                  <?= $site->title ?>
              </b> ?
                <?= translateText('Podemos publicar sua oferta.', 'pt') ?>
              </small> </h5></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($offers as $offer) : ?>
            <tr class="">
              <td width="411" data-content="<?= translateText('Localidade', 'pt') ?>"><table width="100%" border="1">
                <tbody>
                  <tr>
                    <td width="8%"><span class="badge badge- <?= $offer->tipo_oferta[1]  ?>" style="background-color: #FF5722; border: 2px solid transparent; border-radius: 4px; color:#fff">
                      <?= translateText($offer->tipo_oferta[0], 'pt')  ?>
                    </span></td>
                    <td width="24%"><?= translateText('Tipo', 'pt') ?>
                      : <strong>
                        <?= $offer->tipo ?>
                      </strong></td>
                    <td width="28%"><?= translateText('Quantidade', 'pt') ?>
                      : <strong>
                        <?= $offer->quantidade ?>
                      </strong></td>
                    <td width="40%"><?= translateText('Localidade', 'pt') ?>
                      : <strong>
                        <?= $offer->cidade ?>
                        /
                        <?= $offer->estado ?>
                      </strong></td>
                  </tr>
                </tbody>
              </table>
                <table width="100%" border="1">
                <tbody>
                  <tr>
                    <td width="32%"><span class="bg-light offer-image" style="vertical-align: middle; text-align: left;">
                      <?php
								$cont = '0';
								if ($offer->fotos) {
									foreach ($offer->fotos as $foto) {
										$cont = $cont +  '1';
										if ($cont <= '3') {
								?>
                      <a href="#" data-toggle="modal" data-target="#modal-offer-<?= $offer->id  ?>"> <img class="thumbnail-container thumbnail" style="<?php echo $cont == '1' ? 'height: 180px; width: 180px;' : 'height: 120px; width: 120px;' ?>" src="<?= $url . '/upload/fotos/' . $foto . '_thumb.png'  ?>" alt="Sua Imagem"></a>
                      <?php
										}
									}
								}
								?>
                      <?php
								if ($offer->videos) {
									foreach ($offer->videos as $video) {
										if ($cont <= '3') {
								?>
                      <a href="#" data-toggle="modal" data-target="#modal-offer-<?= $offer->id  ?>"> <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLPN6XtCmUFg-DypEGjliuL-FgZG03Mbxc_Q&usqp=CAU" width="60px" height="auto" style="border: 2px solid transparent; border-radius: 4px !important;" loading="lazy"></a>
                      <?php
										}
									}
								}
								?>
                    </span></td>
                    <td width="68%"><table width="100%" border="1">
                      <tbody>
                        <tr>
                          <td><div class="row">
                            <div class="col-lg-12">
                              <p><span class="p-2 align-middle" style="margin-top: 2;"><a href="#" data-toggle="modal" data-target="#modal-offer-<?= $offer->id  ?>" class="btn btn-sm 4 btn-primary pr-4 pl-4" style="background-color: #FF5722; border: 2px solid transparent; border-radius: 4px;">
                                <?= translateText('Detalhes da oferta', 'pt') ?>
                              </a></span><small> </small></p>
                            </div>
                          </div></td>
                        </tr>
                        <tr>
                          <td><div class="row">
                            <div class="col-lg-12">
                              <p><small>
                                <?= nl2br($offer->obs) ?>
                              </small></p>
                            </div>
                          </div></td>
                        </tr>
                      </tbody>
                    </table></td>
                  </tr>
                </tbody>
              </table></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
          <tbody>
          </tbody>
		  </table>
		</div>

		<hr>
		<h4> </h4>
		<?php foreach ($offers as $offer) : ?>
			<?php $id = rand(); ?>
			<?php include 'modal-oferta.php'; ?>
		<?php endforeach; ?>
	<?php } ?>

