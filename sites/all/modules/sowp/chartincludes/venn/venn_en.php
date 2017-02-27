<?php
$p = base_path() . drupal_get_path('module', 'sowp') . '/';

//Define descriptions here for better readability of code.
//Order: 1 is inner circle, then 2-6 are surrounding circles clockwise starting from top.
$descriptions = array(
    1 => 'At the core of the interrelated elements of humanitarian action, from response to resilience and development, are sexual and reproductive health and rights',
    2 => 'Be proactive, not reactive',
    3 => 'Eliminate silos preventing integrated action',
    4 => 'Brighten long-term prospects for women and girls',
    5 => 'Shift from response to resilience',
    6 => 'Meet acute needs',
);
?>

<div class="swp-venndiag">
    <h3 class="color-text b-font swp-upper"><?php print $title; ?></h3>

    <div class="venn-diagram">
        <span class="venn-diagram-heighter"></span>
        <?php
        print theme('sowp_circle', array(
            'label' => 'Sexual and<br />reproductive<br />health and<br />rights',
            'color' => '167, 92, 164', //required as: 'red, green, blue'
            'class' => 'circ-1',
            'info' => $descriptions[1],
            'icon' => 'rights',
        ));
        print theme('sowp_circle', array(
            'label' => 'Prevention and<br />preparedness',
            'color' => '97, 193, 214',
            'class' => 'circ-2',
            'info' => $descriptions[2],
            'icon' => 'prevention',
        ));
        print theme('sowp_circle', array(
            'label' => 'Equitable,<br />inclusive<br />development',
            'color' => '113, 191, 67',
            'class' => 'circ-3',
            'info' => $descriptions[3],
            'icon' => 'development',
        ));
        print theme('sowp_circle', array(
            'label' => 'Recovery',
            'color' => '4, 144, 199',
            'class' => 'circ-4',
            'info' => $descriptions[4],
            'icon' => 'recovery',
        ));
        print theme('sowp_circle', array(
            'label' => 'Resilience',
            'color' => '253, 184, 35',
            'class' => 'circ-5',
            'info' => $descriptions[5],
            'icon' => 'resilience',
        ));
        print theme('sowp_circle', array(
            'label' => 'Effective<br />response',
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
                            At the core of the interrelated elements of humanitarian action, from response to resilience and development, are sexual and reproductive health and rights
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <span class="swp-clear"></span>

    <?php print theme('sowp_sharelinks', array('nid' => $node->nid, 'title' => $title, 'twitter_share' => $twitter_share, 'twitter_hashtags' => $twitter_hashtags)); ?>
</div>