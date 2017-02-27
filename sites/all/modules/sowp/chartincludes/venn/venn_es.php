<?php
$p = base_path() . drupal_get_path('module', 'sowp') . '/';

//Define descriptions here for better readability of code.
//Order: 1 is inner circle, then 2-6 are surrounding circles clockwise starting from top.
$descriptions = array(
    1 => 'En el centro de los elementos interrelacionados de la acci&#xc3;&#xb3;n humanitaria, desde la respuesta hasta la resiliencia y el desarrollo, se encuentran la salud y los derechos sexuales y reproductivos.',
    2 => 'Ser proactivos, no reactivos',
    3 => 'Acabar con la mentalidad compartimentada que impide una acci&#xf3;n integrada',
    4 => 'Mejorar las perspectivas a largo plazo de las mujeres y las ni&#xf1;as',
    5 => 'Pasar de la respuesta a la resiliencia',
    6 => 'Satisfacer las necesidades agudas',
);
?>

<div class="swp-venndiag">
    <h3 class="color-text b-font swp-upper"><?php print $title; ?></h3>

    <div class="venn-diagram">
        <span class="venn-diagram-heighter"></span>
        <?php
        print theme('sowp_circle', array(
            'label' => 'Salud y <br />derechos sexuales <br />y reproductivos',
            'color' => '167, 92, 164', //required as: 'red, green, blue'
            'class' => 'circ-1',
            'info' => $descriptions[1],
            'icon' => 'rights',
        ));
        print theme('sowp_circle', array(
            'label' => 'Prevención y <br />preparación',
            'color' => '97, 193, 214',
            'class' => 'circ-2',
            'info' => $descriptions[2],
            'icon' => 'prevention',
        ));
        print theme('sowp_circle', array(
            'label' => 'Desarrollo,<br />equitativo e<br />inclusivo',
            'color' => '113, 191, 67',
            'class' => 'circ-3',
            'info' => $descriptions[3],
            'icon' => 'development',
        ));
        print theme('sowp_circle', array(
            'label' => 'Recuperación',
            'color' => '4, 144, 199',
            'class' => 'circ-4',
            'info' => $descriptions[4],
            'icon' => 'recovery',
        ));
        print theme('sowp_circle', array(
            'label' => 'Resiliencia',
            'color' => '253, 184, 35',
            'class' => 'circ-5',
            'info' => $descriptions[5],
            'icon' => 'resilience',
        ));
        print theme('sowp_circle', array(
            'label' => 'Respuesta<br />eficaz',
            'color' => '247, 151, 28',
            'class' => 'circ-6',
            'info' => $descriptions[6],
            'icon' => 'response',
        ));
        ?>
    </div>

    <div class="venn-info">
        <div class="venn-info-inner">
            <div class="venn-info-inner-2">
                <div class="venn-info-inner-3">
                    <div class="venn-info-inner-4">
                        <div class="venn-info-text b-font" style="color: rgb(167, 92, 164);">
                            <div class="venn-info-icon"><span class="icon-venn-rights"></span></div>
                            <?php //Enter text that will show up here for non-javascript users and onload. ?>
                            En el centro de los elementos interrelacionados de la acción humanitaria, desde la respuesta hasta la resiliencia y el desarrollo, se encuentran la salud y los derechos sexuales y reproductivos.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <span class="swp-clear"></span>

    <?php print theme('sowp_sharelinks', array('nid' => $node->nid, 'title' => $title, 'twitter_share' => $twitter_share, 'twitter_hashtags' => $twitter_hashtags)); ?>
</div>