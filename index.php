<?php get_header(); ?>
<div id="main">
    <div id="content">

    <div class="news">
      <?php
      	// 1 Parametrage de la requete dans un tableau $args
      	$args = array(
      		'post_type'  => 'post',
      		'category_name' => 'news',
      		'posts_per_page' => '2',
      	);

        // 2. on exécute la query
        $my_query = new WP_Query($args);

        # 3.LA BOUCLE
        // 3. on lance la boucle WHILE!
        if($my_query->have_posts()) : while ($my_query->have_posts() ) : $my_query->the_post();
      		the_title();
      		the_content();
        endwhile;
        endif;

        ?>
        <!-- fin news -->
      </div>

      <h2> Les candidats </h2>
      <div class="candidat">
      	<?php
        // 1 Parametrage de la requete dans un tableau $args
        $args = array(
          'post_type'  => 'candidat',
          'posts_per_page' => '3',
        );
      	// 2. on exécute la query
      	$my_query = new WP_Query($args);

      	#LA BOUCLE
      	// 3. on lance la boucle WHILE!
      	if($my_query->have_posts()) : while ($my_query->have_posts() ) : $my_query->the_post();
      	?>
          <p>
          	<?php
          	    the_title();
          	    echo "</br>DEBUG ID du post :".get_the_ID()." DEBUG</br>";
              	    $prenom = get_post_meta(get_the_ID(), '_ma_valeur_prenom', true);
              	    if(isset($prenom)){
          		          echo " Prénom";
                  	    echo $prenom;
                        echo "</br>";
              	    }

          	    $heros = get_post_meta(get_the_ID(), '_ma_valeur_heroes', true);
          	    if(isset($heros) && $heros != ""){
          		      echo " Son héros : ";
                  	echo $heros;
                    echo "</br>";
              	}
              	else{
          		      echo "Il n'a pas rempli le champs héros";
              	}
          	?>
          </p>
          <?php
          endwhile;
          endif;
          ?>
          <!-- fin candidat -->
        </div>


<!-- fin content -->
    </div>

      <?php get_sidebar(); ?>
      <div id="delimiter">
      </div>
<!-- fin main -->
</div>


<?php get_footer(); ?>
