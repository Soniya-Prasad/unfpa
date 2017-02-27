<?php
$p = base_path() . drupal_get_path('module', 'sowp') . '/';

//Define descriptions here for better readability of code.
//Order: 1 is inner circle, then 2-6 are surrounding circles clockwise starting from top.
$descriptions = array(
    1 => 'La sant&#xe9; et les droits en mati&#xe8;re de sexualit&#xe9; et de procr&#xe9;ation forment le volet central de l&#x2019;action humanitaire, auquel sont rattach&#xe9;s plusieurs &#xe9;l&#xe9;ments interd&#xe9;pendants, de l&#x2019;intervention au d&#xe9;veloppement, en passant par la r&#xe9;silience.',
    2 => 'Place &#xe0; la proactivit&#xe9;, non &#xe0; la r&#xe9;activit&#xe9;',
    3 => '&#xc9;liminer les cloisonnements faisant obstacle &#xe0; une intervention int&#xe9;gr&#xe9;e',
    4 => 'Ouvrir des perspectives &#xe0; long terme pour les femmes et les filles : briser les traditions',
    5 => 'De l&#x2019;intervention &#xe0; la r&#xe9;silience',
    6 => 'R&#xe9;pondre aux besoins pressants',
);
?>

<div class="swp-venndiag">
    <h3 class="color-text b-font swp-upper"><?php print $title; ?></h3>

    <div class="venn-diagram">
        <span class="venn-diagram-heighter"></span>
        <?php
        print theme('sowp_circle', array(
            'label' => 'Sant&#xe9; et droits<br />en mati&#xe8;re de<br />sexualit&#xe9; et de<br />procr&#xe9;ation',
            'color' => '167, 92, 164', //required as: 'red, green, blue'
            'class' => 'circ-1',
            'info' => $descriptions[1],
            'icon' => 'rights',
        ));
        print theme('sowp_circle', array(
            'label' => 'Pr&#xe9;vention et <br />pr&#xe9;paration',
            'color' => '97, 193, 214',
            'class' => 'circ-2',
            'info' => $descriptions[2],
            'icon' => 'prevention',
        ));
        print theme('sowp_circle', array(
            'label' => 'D&#xe9;veloppement,<br />&#xe9;quitable et<br />inclusif',
            'color' => '113, 191, 67',
            'class' => 'circ-3',
            'info' => $descriptions[3],
            'icon' => 'development',
        ));
        print theme('sowp_circle', array(
            'label' => 'Rel&#xe8;vement',
            'color' => '4, 144, 199',
            'class' => 'circ-4',
            'info' => $descriptions[4],
            'icon' => 'recovery',
        ));
        print theme('sowp_circle', array(
            'label' => 'R&#xe9;silience',
            'color' => '253, 184, 35',
            'class' => 'circ-5',
            'info' => $descriptions[5],
            'icon' => 'resilience',
        ));
        print theme('sowp_circle', array(
            'label' => 'Intervention<br />efficace',
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
                            La sant&#xe9; et les droits en mati&#xe8;re de sexualit&#xe9; et de procr&#xe9;ation forment le volet central de l&#x2019;action humanitaire, auquel sont rattach&#xe9;s plusieurs &#xe9;l&#xe9;ments interd&#xe9;pendants, de l&#x2019;intervention au d&#xe9;veloppement, en passant par la r&#xe9;silience.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <span class="swp-clear"></span>

    <?php print theme('sowp_sharelinks', array('nid' => $node->nid, 'title' => $title, 'twitter_share' => $twitter_share, 'twitter_hashtags' => $twitter_hashtags)); ?>
</div>