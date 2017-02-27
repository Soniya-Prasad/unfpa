<?php
print views_embed_view('feature', 'block', $node->nid);
?>
<div id="feature-related-news">
    <?php
    print views_embed_view('vw_news', 'feature_related_news_block', $node->nid);
    ?>
</div>
