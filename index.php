<?php get_header(); ?>
<div id="main">
    <div id="content">
        <h1>Contenu Principal</h1>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<h4>Posted on <?php the_time('F jS, Y') ?></h4>
		<p><?php the_content(__('(more...)')); ?></p>
		<hr> <?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
    </div>
	<?php get_sidebar(); ?>
</div>

<div id="delimiter">
</div>

<h2> Les candidats </h2>
<div class="candidat">
	<?php
		$args = array(
			'post_type'  => 'post',
			'category_name' => 'news',
		);

		// 2. on exécute la query
		$my_query = new WP_Query($args);
#LA BOUCLE
	// 3. on lance la boucle WHILE!
	if($my_query->have_posts()) : while ($my_query->have_posts() ) : $my_query->the_post();
	?>

	<?php    
	    the_title();
	    echo "ID du post :".get_the_ID()."</br>";
    	    $prenom = get_post_meta(get_the_ID(), '_ma_valeur_prenom', true);
    	    if(isset($prenom)){
		echo " ";
        	echo $prenom;
    	    }

	    $heros = get_post_meta(get_the_ID(), '_ma_valeur_heroes', true);
	    var_dump($heros); 
	    if(isset($heros) && $heros != ""){
		echo " ";
        	echo $heros;
    	    }
    	    else{
		echo "No heros";
    	    }

	?>
	</div>
	<?php
	endwhile;
	endif;
	?>

</div>


<?php get_footer(); ?>
