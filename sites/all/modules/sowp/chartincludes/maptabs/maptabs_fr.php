<?php
$p_imgs = base_path() . drupal_get_path('module', 'sowp') . '/chartincludes/maptabs/images/';
?>

<div class="swp-maptabs">

    <div class="maptabs-map">
        <h3 class="sb-font">L’unfpa soutient l’accès des femmes et des filles aux services</h3>

        <img class="maptabs-map-img" src="<?php print $p_imgs; ?>africa-map.png" border="0" usemap="#maptabs-map-imgmap" alt="" />

        <div class="element-invisible">
            <img src="<?php print $p_imgs; ?>nigeria-map.png">
            <img src="<?php print $p_imgs; ?>niger-map.png">
            <img src="<?php print $p_imgs; ?>chad-map.png">
            <img src="<?php print $p_imgs; ?>cameroon-map.png">
        </div>

        <map name="maptabs-map-imgmap" id="maptabs-map-imgmap">
            <area shape="rect" coords="515,571,517,573" alt="Image Map" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_0" />
            <area id="chad-area" alt="Tchad" title="Tchad" href="" shape="poly" coords="226,176,233,172,281,197,284,222,277,225,270,244,278,254,256,268,250,275,229,279,225,269,220,266,220,260,228,260,224,245,217,233,227,217,230,193,225,186" target="_self" data-hoverImage="<?php print $p_imgs; ?>chad-map.png" data-maphilight='Tchad' />
            <area id="niger-area" alt="Niger" title="Niger" href="" shape="poly" coords="157,201,167,198,207,173,217,174,223,179,226,176,227,187,232,194,229,213,216,233,215,237,206,241,199,238,189,242,180,238,173,240,161,235,157,237,152,247,146,245,142,248,142,240,136,240,132,227,138,225,152,224,158,214" target="_self" data-hoverImage="<?php print $p_imgs; ?>niger-map.png" data-maphilight='Niger' />
            <area id="nigeria-area" alt="Nigéria" title="Nigéria" href="" shape="poly" coords="145,282,144,269,151,257,151,248,155,241,158,235,171,237,174,243,180,238,192,242,198,238,210,240,216,237,221,244,221,252,215,258,210,266,206,273,200,285,196,280,187,285,182,295,169,298,165,297,157,285" target="_self" data-hoverImage="<?php print $p_imgs; ?>nigeria-map.png" data-maphilight='Nigéria' />
            <area id="cameroon-area" alt="Cameroun" title="Cameroun" href="" shape="poly" coords="220,241,225,248,227,260,218,261,220,267,229,277,222,289,226,302,234,309,232,313,218,311,212,312,190,313,192,303,182,296,186,286,198,280,201,286,210,269,214,259,221,252" target="_self" data-hoverImage="<?php print $p_imgs; ?>cameroon-map.png" data-maphilight='Cameroun' />
        </map>
    </div><!-- end .maptabs-map -->

    <div class="maptabs-info">
        <div class="maptabs-info-head b-font color-text">
            <p>Fournitures et services fournis entre janvier et septembre 2015 dans les pays du bassin du lac Tchad où sévit Boko Haram</p>
        </div>

        <div class="maptabs-tabs">
            <ul class="maptabs-tab-list b-font">
                <li data-hoverImage="<?php print $p_imgs; ?>cameroon-map.png"><a id="tab-cameroon-area" href="#tab-cameroon">Cameroun</a></li>
                <li data-hoverImage="<?php print $p_imgs; ?>niger-map.png"><a id="tab-niger-area" href="#tab-niger">Niger</a></li>
                <li data-hoverImage="<?php print $p_imgs; ?>chad-map.png"><a id="tab-chad-area" href="#tab-chad">Tchad</a></li>
                <li data-hoverImage="<?php print $p_imgs; ?>nigeria-map.png"><a id="tab-nigeria-area" href="#tab-nigeria">Nigéria</a></li>
            </ul>

            <h3 class="no-script-title">Cameroun</h3>
            <div id="tab-cameroon" class="tab-content">
                <p><strong><span>4 075</span> trousses d’accouchement médicalisé distribuées</strong> dans les relais santé des camps et les centres de santé</p>
                <p><strong><span>5 400</span> kits de dignité</strong> fournis aux femmes et aux filles enceintes ou vulnérables</p>
                <p><strong><span>10 000</span> réservatifs masculins distribués</strong></p>
                <p><strong><span>110</span></strong> femmes bénéficiaires de moyens de <strong>contraception</strong></p>
                <p><strong><span>11</span></strong> cas de <strong>viol pris en charge sur le plan clinique</strong></p>
                <p><strong><span>30</span></strong> agents de santé de district et 40 agents de santé communautaires <strong>formés et déployés</strong></p>
                <p><strong><span>22</span></strong> nouvelles <strong>sages-femmes déployées</strong></p>
                <p><strong><span>5</span> maisons des jeunes équipées</strong> pour permettre aux adolescents d’acquérir des compétences et d’être accompagnés</p>
                <p><strong><span>4</span></strong> établissements de santé publics équipés destinés aux réfugiés, proposant des <strong>services de santé reproductive de qualité</strong></p>
                <p><strong><span>4</span> espaces dédiés aux jeunes et aux femmesspaces</strong> créés dans le camp de Minawao</p>
            </div>

            <h3 class="no-script-title">Niger</h3>
            <div id="tab-niger" class="tab-content">
                <p><strong><span>53 312</span> préservatifs distribués</strong></p>
                <p><strong><span>10 913</span></strong> femmes et adolescentes bénéficiaires de la <strong>planification familiale</strong></p>
                <p><strong><span>1 458</span> accouchements</strong> pratiqués en toute <strong>sécurité</strong></p>
                <p><strong><span>1 407</span> kits de dignité</strong> distribués aux réfugiées</p>
                <p><strong><span>906</span></strong> femmes bénéficiaires de <strong>soins prénatals</strong></p>
                <p><strong><span>118</span></strong> adolescents et jeunes formés en tant  <strong>qu’éducateurs en santé</strong> reproductive pour les réfugiés </p>
                <p><strong><span>40</span> prestataires de santé</strong> formés</p>
                <p><strong><span>22</span></strong> victimes de violence sexiste bénéficiaires d’un <strong>soutien psychologique</strong></p>
            </div>

            <h3 class="no-script-title">Tchad</h3>
            <div id="tab-chad" class="tab-content">
                <p><strong><span>28 000</span> préservatifs distribués</strong></p>
                <p><strong><span>2 500</span></strong> femmes, hommes et jeunes sensibilisés à la  <strong>violence sexiste</strong> dans le cadre de séances d’information</p>
                <p><strong><span>1 500</span></strong> femmes bénéficiaires de <strong>soins prénatals</strong></p>
                <p><strong><span>1 500</span></strong> femmes bénéficiaires de <strong>services relatifs à la violence sexiste</strong></p>
                <p><strong><span>510</span> accouchements</strong>  pratiqués en toute  <strong>sécurité</strong></p>
                <p><strong><span>500</span></strong> femmes bénéficiaires de moyens de <strong>contraception</strong></p>
            </div>

            <h3 class="no-script-title">Nigeria</h3>
            <div id="tab-nigeria" class="tab-content">
                <p><strong><span>2 108 441</span></strong> personnes sensibilisées à la prévention et à la neutralisation de la <strong>violence sexiste</strong></p>
                <p><strong><span>27 293</span> accouchements</strong>  pratiqués en toute <strong>sécurité</strong></p>
                <p><strong><span>22 000</span></strong> femmes et adolescentes bénéficiaires de <strong>kits de dignité</strong></p>
                <p><strong><span>214</span> trousses de santé reproductive</strong> (1 759 cartons) distribuées, contenant du matériel médical de première nécessité, des médicaments et d’autres articles</p>
                <p><strong><span>213</span> agents de santé et responsables de programme formés</strong> à la prestation de services de santé reproductive dans les situations de crise humanitaire</p>
                <p><strong><span>56</span> sages-femmes et infirmières formées</strong> à l’administration de moyens de contraception réversibles à longue durée d’action</p>
            </div>
        </div>

        <?php print theme('sowp_sharelinks', array('nid' => $node->nid, 'title' => $title, 'twitter_share' => $twitter_share, 'twitter_hashtags' => $twitter_hashtags)); ?>

    </div><!-- .maptabs-info -->

    <span class="swp-clear"></span>
</div>