<?php

/**
 * @file
 * Theme implementation to display SOWMY whatif section.
 */
?>
<h2><?php print t('ESTIMATES AND PROJECTIONS TO 2030'); ?></h2>
<h2>
    <?php print t('WHAT IF...'); ?>
    <span>
        <?php print t('Estimates of met need based on available data.'); ?>
    </span>
</h2>
<div class="block">
    <div class="number">1</div>
    <div class="title"><?php print t('The number of pregnancies was reduced by 20% by 2030?'); ?></div>
    <div class="current">
        <div class="visuals">
            <span>
                <?php print $whatif_data['B']; ?>
            </span>
            <?php print t('million'); ?>
        </div>
        <div class="label"><?php print t('CURRENT'); ?></div>
    </div>
    <div class="arrow"></div>
    <div class="scenario">
        <div class="visuals">
            <span>
                <?php print $whatif_data['C']; ?>
            </span>
            <?php print t('million'); ?>
        </div>
        <div class="label"><?php print t('SCENARIO'); ?></div>
    </div>
    <p><?php print t('Immediate increase in met need for pregnancy, birth, post-partum/postnatal care. Acceleration in met need for pre- pregnancy services from 2028 onwards.'); ?></p>
</div>
<div class="block number-of-midwife">
    <div class="number">2</div>
    <div class="title"><?php print t('The number of midwife, nurse and physician graduates doubled by 2020?'); ?></div>
    <div class="current">
        <div class="visuals"></div>
        <div class="label"><?php print t('CURRENT'); ?></div>
        <div class="details">
            <span>
                <?php print $whatif_data['F']; ?>
                %
            </span>
            <?php print t('MET NEED 2030'); ?>
        </div>
    </div>
    <div class="arrow"></div>
    <div class="scenario">
        <div class="visuals"></div>
        <div class="label"><?php print t('SCENARIO'); ?></div>
        <div class="details">
            <span>
                <?php print $whatif_data['G']; ?>
                %
            </span>
            <?php print t('MET NEED 2030'); ?>
        </div>
    </div>
</div>
<div class="block efficiency">
    <div class="number">3</div>
    <div class="title"><?php print t('Efficiency improved by 2% per year until 2030?') ?></div>
    <div class="current">
        <div class="visuals"></div>
        <div class="label"> <?php print t('CURRENT'); ?></div>
        <div class="details">
            <span>
                <?php print $whatif_data['H']; ?>
                %
            </span>
            <?php print t('MET NEED 2030') ?>
        </div>
    </div>
    <div class="arrow"></div>
    <div class="scenario">
        <div class="visuals"></div>
        <div class="label"><?php print t('SCENARIO'); ?></div>
        <div class="details">
            <span>
                <?php print $whatif_data['I']; ?>
                %
            </span>
            <?php print t('MET NEED 2030'); ?>
        </div>
    </div>
</div>
<div class="block attrition">
    <div class="number">4</div>
    <div class="title"><?php print t('Attrition was halved in the next 5 years (2012-2017)?'); ?></div>
    <div class="current">
        <div class="visuals">
            <span>
                <?php print $whatif_data['J']; ?>
                %
            </span>
            <?php print t('leak') ?>
        </div>
        <div class="label"><?php print t('CURRENT'); ?></div>
        <div class="details">
            <span>
                <?php print $whatif_data['D']; ?>
                %
            </span>
            <?php print t('MET NEED 2030'); ?>
        </div>
    </div>
    <div class="arrow"></div>
    <div class="scenario">
        <div class="visuals">
            <span>
                <?php print $whatif_data['K']; ?>
                %
            </span>
            <?php print t('leak'); ?>
        </div>
        <div class="label"><?php print t('SCENARIO') ?></div>
        <div class="details">
            <span>
                <?php print $whatif_data['E']; ?>
                %
            </span>
            <?php print t('MET NEED 2030'); ?>
        </div>
    </div>
</div>
