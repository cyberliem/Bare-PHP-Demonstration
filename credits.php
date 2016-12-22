<?php

session_start();
include($_SERVER["DOCUMENT_ROOT"] .'/includes/header.html');
ini_set('display_errors', 1);


echo '

<div class="separated-line universal-block block-10">
  <legend class="item-Title"> About the author</legend>
  <div class="row">
        <div class="universal-block block-2">
            <img src="/Images/Liem.jpg"
            alt="Author" />
        </div>
        <div class="universal-block block-5">
            <blockquote>
                <p>Liem Duc Nguyen</p> <small><cite title="Source Title">Bloody, Am I to do PHP again? </cite></small>
            </blockquote>
            <p> <b>Student ID</b> 16041325
                <br/> <b>FIN</b> G1478692R
                <br /> <b>Email</b> cyberliem.civil@gmail.com
                <br /> <b>Phone</b> +6591221805
            </p>
        </div>
         <div class="universal-block block-5">
         
			<blockquote>
                <p>Who be this man?</p>
            </blockquote>
            Lo and behold, his grand admiral cyberLiem. Bestowed to this world at the year 1991, he is now of 25 years old, a proud and passionate man that quick to laugh, easy to forget and warm at heart. Currently working and studying in Singapore, he looks forward to bring about new prosperity for his kinds.
         
        </div>
  </div>
</div>';

echo '

<div class="separated-line universal-block block-10">
 
  <div class="row">
		<h3>List of referrences for the concepts on this website</h3>
		<p>
		<b>Larry Ullman</b> (2012),<i>PHP and MySQL for Dynamic Web Sites</i>, 4th Edition. USA: Pearson Education
		</br>
        <b>Larry Ullman</b> (2013),<i>Advanced PHP and Object Orientation Programmings</i>, 1th Edition. California, USA: Peach City
		</br>
		<b>W3school </b>(1999-2016), CSS tutorial. <i>THE WORLDS LARGEST WEB DEVELOPER SITE</i>. Available at http://www.w3schools.com/css/default.asp [Accessed 10 OCT.2016]
		</br>
		<b>Brian Proffitt </b>(2013), What APIs are and Why they"re important <i>Readwrite in Hack</i>. Available at http://readwrite.com/2013/09/19/api-defined/ [Accessed 12 OCT.2016]
		</br>
		<b>Corey Maynard </b>(2013), <i>Creating A RESTful API with PHP</i>, Available at http://coreymaynard.com/blog/creating-a-restful-api-with-php/ [Accessed 12 OCT.2016]
		</br>
		<b>phpdelusions </b>(2016), <i>(The only proper) PDO tutorial </i>, Available at https://phpdelusions.net/pdo [Accessed 18 OCT.2016]
		</br>
		<b>iNADhttps </b> (2015), <i>Sending A GET/POST Request via PHP without CURL</i>, Available at http://gist.github.com/iNaD/c2c19bcc9bb9e04b1fe8 [Accessed 11 NOV.2016]
		</br>
		<b>The PHP group </b> (2001-2016), <i>PHP Documentation</i>, Available at http://php.net/docs.php [Accessed 10 NOV.2016]
		</p>
		<p>
		</p>
  </div>
   <div class="row">
		If you want to know how this website is made in detail, look for the Report Docx File under the rootfolder
  </div>
</div>';

include($_SERVER["DOCUMENT_ROOT"] .'/includes/footer.html');
