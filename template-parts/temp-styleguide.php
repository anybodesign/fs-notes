<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for the Typographie.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Notes
 * @since 1.0
 * @version 1.0
 */
?>

					<h2>Typography (this is a subtitle)</h2>
					
					<p>Curabitur blandit tempus porttitor. <a href="#">Lorem ipsum dolor</a> sit amet, consectetur adipiscing elit. Aenean eu leo quam. <strong>Pellentesque ornare</strong> sem lacinia quam venenatis vestibulum.</p>

					<div>Inside a div…</div>
					
					<span>Inside a span</span>
										
					<h3>This is a section subtitle</h3>
					
					<p>Etiam porta <span>in a span</span> sem malesuada magna mollis euismod. <em>Nullam id dolor id nibh ultricies vehicula ut id elit.</em> Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Vestibulum id ligula porta felis euismod semper.</p>
					
					<ul>
						<li>I'm a list</li>
						<li>Unordered list...</li>
						<li>That's funny</li>
					</ul>

					<p>
						<a href="#" class="action-btn">Action button</a> 
						<a href="#" class="white-btn">White button</a> 
					</p>
					
					
					<h4>And here is the section subtitle</h4>
					
					<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
					
					<h4>And is subtitle mate</h4>
					
					<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
					
					<ol>
						<li>The ordered list</li>
						<li>Because we love order</li>
						<li>Or not…</li>
					</ol>
					
					<blockquote>
						“ Typography is the craft of endowing human language with a durable visual form.  (I'm a quote) “
						<cite>Robert Bringhurst</cite>
					</blockquote>
					
					<div class="white-text" style="background-color:#303030;margin-bottom:1.5rem;padding:1.5rem;">
						
						<h4>Some content on a dark background</h4>
						
						<p>Vivamus sagittis lacus vel augue <span>laoreet (in a span)</span> rutrum faucibus dolor auctor. <strong>Vivamus sagittis lacus vel augue laoreet</strong> rutrum faucibus dolor auctor. Nullam id dolor id nibh ultricies vehicula ut id elit. Cras mattis consectetur purus sit amet fermentum. Cras mattis consectetur purus sit amet fermentum. <em>Curabitur blandit tempus porttitor.</em></p>
						<ul>
							<li>Toto</li>
							<li>Lili</li>
							<li>Nono</li>
						</ul>
						<small>That's all folks</small>
						
					</div>
					
					<p>A code block:</p>
					<pre>
					    array(
					        &nbsp;'name' => __( 'very light gray', 'themeLangDomain' ),
					        &nbsp;'slug' => 'very-light-gray',
					        &nbsp;'color' => '#e0e0e0',
					    ),
					</pre>
					
					<p>Here is some <mark>inline</mark> code: <code>color: #444;</code> (CSS)</p>
					
					<h3>Forms</h3>
					
					<p>Sed posuere consectetur est at lobortis.</p>
					
					<form style="max-width: 50rem;">
						<fieldset>
							<legend>Fieldset Legend</legend>
							
							<div class="formfield-text">
								<label for="inp_text">The Label</label>
								<input type="text" id="inp_text" placeholder="A placeholder…">
							</div>
							
							<div class="formfield-checkbox">
								<input type="checkbox" id="inp_check">
								<label for="inp_check">The Label</label>
							</div>
							
							<div class="formfield-radio">
								<input type="radio" id="inp_rad">
								<label for="inp_rad">The Label</label>
							</div>
							
							<div class="formfield-select">
								<label for="inp_sel" class="screen-reader-text">The Label</label>
								<div class="formfield-select--container">
									<select id="inp_sel">
										<option>Option 1</option>
										<option>Option 2 with a very very long option text to show ellipsis</option>
										<option>Option 3</option>
										<option>Option 4</option>
									</select>
									
								</div>
							</div>
							
							<input type="submit" class="action-btn" value="Send">
							
						</fieldset>
					</form>
					
					
					
					<h3>Images, Players & Tables</h3>
					
					<figure style="max-width: 50rem;">
						<a href="#"><img src="http://placecorgi.com/500/340"></a>
						<figcaption>
							Place a Corgi
						</figcaption>
					</figure>
				
					<figure style="max-width: 50rem;">
						<a href="https://www.youtube.com/watch?v=PtMx316Vpvw">
							<img src="https://i1.ytimg.com/vi/PtMx316Vpvw/mqdefault.jpg">
						</a>
						<figcaption>
							Ride - Pulsar (vidéo)
						</figcaption>
					</figure>

					<div class="table-container">
						<table width="100%">
							<thead>
								<tr>
									<th>Animal</th>
									<th>Name</th>
									<th>Age</th>
									<th>Weight</th>
									<th>Hobby</th>
									<th>Passion</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Cat</td>
									<td>Prosper</td>
									<td>13</td>
									<td>8 kg</td>
									<td>Sleeping</td>
									<td>Food</td>
								</tr>
								<tr>
									<td>Cat</td>
									<td>Garfield</td>
									<td>4</td>
									<td>5 kg</td>
									<td>Hunting</td>
									<td>Food</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="6">That's all about cats now...</td>
								</tr>
							</tfoot>
						</table>
					</div>