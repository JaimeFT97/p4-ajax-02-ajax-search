<?php 
      $dbhost 	= "localhost";
	    $dbname		= "record_company";
	    $dbuser		= "root";
	    $dbpass		= "";
      $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
      //SELECT
          //Gender Table
          $sql = "SELECT id, gender_name  FROM gender";
          $q = $conn->prepare($sql);
          $result = $q->execute();
          $gender = $q->fetchAll();   
          //Country Table
          $sql2 = "SELECT id, country_name  FROM country";
          $q2 = $conn->prepare($sql2);
          $result2 = $q2->execute();
          $country = $q2->fetchAll();  
          //Language Table
          $sql3 = "SELECT id, language_name  FROM language";
          $q3 = $conn->prepare($sql3);
          $result3 = $q3->execute();
          $language = $q3->fetchAll();
          //Album Table
          $sql4 = "SELECT id, album_name  FROM album";
          $q4 = $conn->prepare($sql4);
          $result4 = $q4->execute();
          $album = $q4->fetchAll();
          //Artist Table
          $sql5 = "SELECT id, artistic_name  FROM artist";
          $q5 = $conn->prepare($sql5);
          $result5 = $q5->execute();
          $artist = $q5->fetchAll(); 

      if(!empty($_POST)){
        $aKeyword = explode(" ", $_POST['pattern']);        
        $sqlSong = "SELECT id, song_name, gender_id, language_id, country_id, link_song, album_id, artist_id FROM song WHERE song_name LIKE '%".$aKeyword[0]."%'";
        $qSong = $conn->prepare($sqlSong);
        $resultSong = $qSong->execute();  
        $song = $qSong->fetchAll(); 
        ?>
              <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Song Name</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Language</th>
                      <th scope="col">Country</th>
                      <th scope="col">Album</th>
                      <th scope="col">Artist</th>
                      <th scope="col">Song Link</th>
                      
                    </tr>
                  </thead>
                  <tbody>    
          <?php
                  for($i=0; $i < count($song); $i++){
          ?>
                <tr>
                        <td class="text-capitalize"><?php echo $song[$i]["id"]; ?></td>
                        <td class="text-capitalize"><?php echo $song[$i]["song_name"]; ?></td>
                        <td class="text-capitalize">
                        <?php 
                        for($j=0; $j < count($gender); $j++){
                          if ($song[$i]['gender_id']==$gender[$j]["id"]) {
                          echo $gender[$j]["gender_name"];
                          }
                        }
          ?>
                      </td>
                      <td class="text-capitalize">
                  <?php 
                        for($j=0; $j < count($language); $j++){
                          if ($song[$i]['language_id']==$language[$j]["id"]) {
                          echo $language[$j]["language_name"];
                          }
                        }
          ?>
                      </td>
                      <td class="text-capitalize">
                  <?php 
                        for($j=0; $j < count($country); $j++){
                          if ($song[$i]['country_id']==$country[$j]["id"]) {
                          echo $country[$j]["country_name"];
                          }
                        }
          ?>
                      </td>
                      <td class="text-capitalize">
                  <?php 
                        for($j=0; $j < count($album); $j++){
                          if ($song[$i]['album_id']==$album[$j]["id"]) {
                          echo $album[$j]["album_name"];
                          }
                        }
          ?>
                      </td>
                      <td class="text-capitalize">
          <?php 
                        for($j=0; $j < count($artist); $j++){
                          if ($song[$i]['artist_id']==$artist[$j]["id"]) {
                          echo $artist[$j]["artistic_name"];
                          }
                        }
          ?>
                      </td>
                      <td>
                        <a href="<?php echo $song[$i]["link_song"]; ?>" target="_blank">
                          <button type="button" class="btn btn-outline-primary">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-film" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0h8v6H4V1zm8 8H4v6h8V9zM1 1h2v2H1V1zm2 3H1v2h2V4zM1 7h2v2H1V7zm2 3H1v2h2v-2zm-2 3h2v2H1v-2zM15 1h-2v2h2V1zm-2 3h2v2h-2V4zm2 3h-2v2h2V7zm-2 3h2v2h-2v-2zm2 3h-2v2h2v-2z"></path>
                            </svg>
                          </button>
                        </a>
                      </td>
                  </tr>
          <?php
                    }
          ?> 
                  </tbody>
                </table>
          <?php
    
      } 
    ?>
