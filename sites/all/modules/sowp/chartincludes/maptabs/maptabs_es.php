<?php
$p_imgs = base_path() . drupal_get_path('module', 'sowp') . '/chartincludes/maptabs/images/';
?>

<div class="swp-maptabs">

    <div class="maptabs-map">
        <h3 class="sb-font">El unfpa facilita el acceso de las mujeres y las niñas a los servicios</h3>

        <img class="maptabs-map-img" src="<?php print $p_imgs; ?>africa-map.png" border="0" usemap="#maptabs-map-imgmap" alt="" />

        <div class="element-invisible">
            <img src="<?php print $p_imgs; ?>nigeria-map.png">
            <img src="<?php print $p_imgs; ?>niger-map.png">
            <img src="<?php print $p_imgs; ?>chad-map.png">
            <img src="<?php print $p_imgs; ?>cameroon-map.png">
        </div>

        <map name="maptabs-map-imgmap" id="maptabs-map-imgmap">
            <area shape="rect" coords="515,571,517,573" alt="Image Map" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_0" />
            <area id="chad-area" alt="Chad" title="Chad" href="" shape="poly" coords="226,176,233,172,281,197,284,222,277,225,270,244,278,254,256,268,250,275,229,279,225,269,220,266,220,260,228,260,224,245,217,233,227,217,230,193,225,186" target="_self" data-hoverImage="<?php print $p_imgs; ?>chad-map.png" data-maphilight='Chad' />
            <area id="niger-area" alt="Níger" title="Níger" href="" shape="poly" coords="157,201,167,198,207,173,217,174,223,179,226,176,227,187,232,194,229,213,216,233,215,237,206,241,199,238,189,242,180,238,173,240,161,235,157,237,152,247,146,245,142,248,142,240,136,240,132,227,138,225,152,224,158,214" target="_self" data-hoverImage="<?php print $p_imgs; ?>niger-map.png" data-maphilight='Níger' />
            <area id="nigeria-area" alt="Nigeria" title="Nigeria" href="" shape="poly" coords="145,282,144,269,151,257,151,248,155,241,158,235,171,237,174,243,180,238,192,242,198,238,210,240,216,237,221,244,221,252,215,258,210,266,206,273,200,285,196,280,187,285,182,295,169,298,165,297,157,285" target="_self" data-hoverImage="<?php print $p_imgs; ?>nigeria-map.png" data-maphilight='Nigeria' />
            <area id="cameroon-area" alt="Camerún" title="Camerún" href="" shape="poly" coords="220,241,225,248,227,260,218,261,220,267,229,277,222,289,226,302,234,309,232,313,218,311,212,312,190,313,192,303,182,296,186,286,198,280,201,286,210,269,214,259,221,252" target="_self" data-hoverImage="<?php print $p_imgs; ?>cameroon-map.png" data-maphilight='Camerún' />
        </map>
    </div><!-- end .maptabs-map -->

    <div class="maptabs-info">
        <div class="maptabs-info-head b-font color-text">
            <p>Servicios y suministros facilitados entre enero y septiembre de 2015 en los países de la cuenca del lago Chad afectados por la crisis de Boko Haram</p>
        </div>

        <div class="maptabs-tabs">
            <ul class="maptabs-tab-list b-font">
                <li data-hoverImage="<?php print $p_imgs; ?>cameroon-map.png"><a id="tab-cameroon-area" href="#tab-cameroon">Camerún</a></li>
                <li data-hoverImage="<?php print $p_imgs; ?>niger-map.png"><a id="tab-niger-area" href="#tab-niger">Níger</a></li>
                <li data-hoverImage="<?php print $p_imgs; ?>chad-map.png"><a id="tab-chad-area" href="#tab-chad">Chad</a></li>
                <li data-hoverImage="<?php print $p_imgs; ?>nigeria-map.png"><a id="tab-nigeria-area" href="#tab-nigeria">Nigeria</a></li>
            </ul>

            <h3 class="no-script-title">Camerún</h3>
            <div id="tab-cameroon" class="tab-content">
                <p><strong>Se distribuyeron <span>4.075</span> kits de parto sin riesgos</strong> en los puestos sanitarios de los campamentos y centros</p>
                <p>Se distribuyeron <strong><span>5.400</span> kits de dignidad</strong> para embarazadas, y mujeres y niñas vulnerables</p>
                <p><strong>Se distribuyeron <span>10.000</span> preservativos masculinos</strong></p>
                <p><strong><span>110</span></strong> mujeres accedieron a métodos <strong>anticonceptivos</strong></p>
                <p><strong>Se trataron clínicamente <span>11</span></strong> casos de <strong>violación</strong></p>
                <p><strong>Se capacitó y desplegó a <span>30</span></strong> trabajadores sanitarios de distrito y 40 agentes de salud comunitarios</p>
                <p>Se desplegó a <strong><span>22</span> parteras recién capacitadas</strong></p>
                <p><strong>Se equiparon <span>5</span> centros juvenilesy</strong> con miras al desarrollo de aptitudes y el asesoramiento de adolescentes</p>
                <p>Se equiparon <strong><span>4</span></strong> centros de salud pública que atienden a los refugiados con miras a la prestación de <strong>servicios de salud reproductiva de calidad</strong></p>
                <p>Se crearon <strong><span>4</span> espacios específicos para jóvenes y mujeres</strong> en el campamento de Minawao</p>
            </div>

            <h3 class="no-script-title">Níger</h3>
            <div id="tab-niger" class="tab-content">
                <p>Se distribuyeron <strong><span>53.312</span> preservativos</strong></p>
                <p><strong><span>10.913</span></strong> mujeres y niñas adolescentes accedieron a la  <strong>planificación familiar</strong></p>
                <p><strong><span>1.458</span></strong> mujeres recibieron asistencia para un <strong>parto sin riesgos</strong></p>
                <p>Se distribuyeron <strong><span>1.407</span>  kits de dignidad</strong>  entre los refugiados</p>
                <p><strong><span>906</span></strong> mujeres recibieron <strong>atención prenatal</strong></p>
                <p><strong><span>118</span></strong> adolescentes y jóvenes recibieron capacitación para trabajar como <strong>educadores en materia de salud </strong>reproductiva para los <strong>refugiados </strong></p>
                <p>Se capacitó a <strong><span>40</span> proveedores de salud</strong></p>
                <p><strong><span>22</span></strong> mujeres supervivientes de la violencia por razón de género recibieron <strong>apoyo psicológico</strong></p>
            </div>

            <h3 class="no-script-title">Chad</h3>
            <div id="tab-chad" class="tab-content">
                <p>Se distribuyeron <strong><span>28.000</span> preservativos</strong></p>
                <p><strong><span>2.500</span></strong> mujeres, hombres y jóvenes asistieron a las sesiones de concienciación sobre la <strong>violencia por razón de género</strong></p>
                <p><strong><span>1.500</span></strong> mujeres recibieron <strong>atención prenatal</strong></p>
                <p><strong><span>1.500</span></strong> mujeres recibieron <strong>servicios relacionados con la violencia por razón de género</strong></p>
                <p><strong><span>510</span></strong> mujeres recibieron asistencia para un <strong>parto sin riesgos</strong></p>
                <p><strong><span>500</span></strong> mujeres accedieron a métodos <strong>anticonceptivos</strong></p>
            </div>

            <h3 class="no-script-title">Nigeria</h3>
            <div id="tab-nigeria" class="tab-content">
                <p>Se concienció a <strong><span>2.108.441</span></strong> personas sobre la prevención de la <strong>violencia por razón de género</strong> y la adopción de medidas al respecto</p>
                <p><strong><span>27.293</span></strong> mujeres recibieron asistencia para un <strong>parto sin riesgos</strong></p>
                <p><strong><span>22.000</span></strong> mujeres y adolescentes recibieron <strong>kits de dignidad</strong></p>
                <p>Se distribuyeron<strong><span>214</span> botiquines de salud reproductiva </strong> (1.759 cajas), con diversos equipos médicos, medicamentos y otros suministros que salvan vidas</p>
                <p><strong>Se capacitó a <span>213</span> trabajadores sanitarios y directores de programas</strong> en la prestación de servicios de salud reproductiva en contextos humanitarios</p>
                <p><strong>Se capacitó a <span>56</span> parteras y enfermeros</strong> en la administración de anticonceptivos reversibles de acción prolongada</p>
            </div>
        </div>

        <?php print theme('sowp_sharelinks', array('nid' => $node->nid, 'title' => $title, 'twitter_share' => $twitter_share, 'twitter_hashtags' => $twitter_hashtags)); ?>

    </div><!-- .maptabs-info -->

    <span class="swp-clear"></span>
</div>