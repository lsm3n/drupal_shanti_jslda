<?php

// Overwrite # topics if given in query
if (isset($_GET['topics']) && is_numeric($_GET['topics'])) {
	$topicn = $_GET['topics'];
}

// Put stuff in JS world
$js_settings = array(
  'corpus_url'    => $corpus_url,
  'stopwords_url' => $stopwords_url,
  'topicn'        => $topicn
);

// Load all the files
drupal_add_css(SHANTI_JSLDA_PATH . '/css/shanti-jslda-default.css', array('type' => 'file'));
drupal_add_css('http://fonts.googleapis.com/css?family=Alegreya', array('type' => 'external'));
drupal_add_js(SHANTI_JSLDA_PATH . '/js/d3.v3.min.js');
drupal_add_js(SHANTI_JSLDA_PATH . '/js/xregexp-all-min.js');
drupal_add_js(SHANTI_JSLDA_PATH . '/js/queue.min.js');
drupal_add_js(SHANTI_JSLDA_PATH . '/js/shanti-jslda-default.js', array('scope' => 'footer'));
drupal_add_js(array('shanti_jslda' => $js_settings), 'setting');

?><div id="tooltip"></div>
<div id="main">
  <div id="form" class="top">
    <button id="sweep">Run 50 iterations</button> Iterations: <span id="iters">0</span>
    <form>
			<span><a href="<?php print $corpus_url; ?>" target="_blank">CORPUS</a></span> 
			| <span><a href="<?php print $stopwords_url; ?>"  target="_blank">STOPWORDS</a></span>
      | # Topics: 
      <input id="num-topics-input" type="text" name="topics" value="<?php print $topicn; ?>" size="3"/> 
      <input type="submit" value="Load"/>
    </form>
  </div>
  <div class="sidebar">
    <div id="topics" class="sidebox"></div>
  </div>
  <div id="tabwrapper">
    <div class="tabs">
      <ul>
        <li id="docs-tab" class="selected page-tab">Topic Documents</li>
        <li id="corr-tab" class="page-tab">Topic Correlations</li>
        <li id="dl-tab" class="page-tab">Downloads</li>
        <li id="vocab-tab" class="page-tab">Vocabulary</li>
      </ul>
    </div>
    <div id="pages">
    
      <div id="docs-page" class="page">
        <div class="help">Documents are sorted by their proportion of the currently selected topic, biased to prefer longer documents.</div>
      </div>
    
    	<div id="vocab-page" class="page">
        <div class="help">Words occurring in only one topic have specificity 1.0, words evenly distributed among all topics have specificity 0.0.</div>
        <table id="vocab-table">
          <thead><th>Word</th><th>Frequency</th><th>Topic Specificity</th></thead>
          <tbody></tbody>
        </table>
      </div>
      
      <div id="corr-page" class="page">
        <div class="help">Topics that occur together more than expected are blue, topics that occur together less than expected are red.</div>
      </div>
      
      <div id="dl-page" class="page">
        <div class="help">Each file is in comma-separated format.</div>
        <ul>
          <li><a id="doctopics-dl" href="javascript:;" download="doctopics.csv">Document topics</a></li>
          <li><a id="topicwords-dl" href="javascript:;" download="topicwords.csv" onclick="saveTopicWords()">Topic words</a></li>
          <li><a id="keys-dl" href="javascript:;" download="keys.csv" onclick="saveTopicKeys()">Topic summaries</a></li>
          <li><a id="topictopic-dl" href="javascript:;" download="topictopic.csv" onclick="saveTopicPMI()">Topic-topic connections</a></li>
          <li><a id="graph-dl" href="javascript:;" download="gephi.csv" onclick="saveGraph()">Doc-topic graph file (for Gephi)</a></li>
          <li><a id="state-dl" href="javascript:;" download="state.csv" onclick="saveState()">Complete sampling state</a></li>
        </ul>
      </div>
      
    </div>  
  </div>
</div>