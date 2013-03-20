  <h3> Modules &raquo; Member &raquo; Detil</h3>
            <table>
              <?php foreach($query as $v){ ?>
                <tr valign="top">
                  <td width="150"><strong>Name  </strong></td>
		  <td width="10"><strong>:</strong></td>
                  <td><?php echo $v->name;?></td>
                </tr>
		<tr valign="top">
                  <td width="150"><strong>Gender  </strong></td>
		  <td width="10"><strong>:</strong></td>
                  <td><?php echo $v->gender;?></td>
                </tr>
		<tr valign="top">
                  <td width="150"><strong>Birthdate  </strong></td>
		  <td width="10"><strong>:</strong></td>
                  <td><?php echo date("d M Y",strtotime($v->birthdate));?></td>
                </tr>
                <tr valign="top">
                  <td width="150"><strong>Phone  </strong></td>
		  <td width="10"><strong>:</strong></td>
                  <td><?php echo $v->phone;?></td>
                </tr>
		<tr valign="top">
                  <td width="150"><strong>Email </strong></td>
		  <td width="10"><strong>:</strong></td>
                  <td><?php echo $v->email;?></td>
                </tr>
		<tr valign="top">
                  <td width="150"><strong>Hometown  </strong></td>
		  <td width="10"><strong>:</strong></td>
                  <td><?php
		  $home = unserialize($v->hometown);
		  echo $home['city']. ', ' .$home['state']. ', ' . $home['country'];		  
		  ?></td>
                </tr>
		<tr valign="top">
                  <td width="150"><strong>Current Location  </strong></td>
		  <td width="10"><strong>:</strong></td>
                  <td><?php
		  
		  $curr = unserialize($v->current_location);
		  echo $curr['city']. ', ' .$curr['state']. ', ' . $curr['country'];
		  		  
		  ?></td>
                </tr>
		<tr valign="top">
                  <td width="150"><strong>Education  </strong></td>
		  <td width="10"><strong>:</strong></td>
                  <td><?php
		  
		  $edu = unserialize($v->education);
		  if($edu){
		  echo "<ul>";  
		  foreach($edu as $v2){
		        echo "<li>".$v2['type'].' '.$v2['school']['name'].', Year : '.$v2['year']['name']."</li>";  
		  }
		  echo "</ul>";
		  }
		  
		  //echo $v->education;
		  
		  ?>
		  
		  </td>
                </tr>
		<!--<tr valign="top">
                  <td width="150"><strong>Work  </strong></td>
		  <td width="10"><strong>:</strong></td>
                  <td><?php echo $v->work;?></td>
                </tr>
		<tr valign="top">
                  <td width="150"><strong>Devices</strong></td>
		  <td width="10"><strong>:</strong></td>
                  <td><?php echo $v->devices;?></td>
                </tr>-->
		<tr valign="top">
                  <td width="150"><strong>Text Pantun </strong></td>
		  <td width="10"><strong>:</strong></td>
                  <td><?php echo $v->yourtext;?></td>
                </tr>		
            <?php } ?>
            </table>

