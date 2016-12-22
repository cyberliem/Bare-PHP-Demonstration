<?php

session_start();
include('includes/header.html');
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

 echo'<div class="separated-line">
	<p><b><i><a href="/DIT-AssignmentPartB-LiemDucNguyen-16041325.docx">
	If you want to know how this website is made in detail, look for the Report Docx File under the rootfolder (or click here to download)
	</a></i></b></p>		
	</div>';

echo '

<div class="separated-line universal-block block-10">
 
  <div class="separated-line">
		<h3>List of referrences for the concepts on this website</h3>
		
		<p>
		<b>Larry Ullman</b> (2012),<i>PHP and MySQL for Dynamic Web Sites</i>, 4th Edition. USA: Pearson Education
		</br>
        <b>Larry Ullman</b> (2013),<i>Advanced PHP and Object Orientation Programmings</i>, 1th Edition. California, USA: Peach City
		</br>
		<b>W3school </b>(1999-2016), CSS tutorial. <i>THE WORLDS LARGEST WEB DEVELOPER SITE</i>. Available at <a href="http://www.w3schools.com/css/default.asp">http://www.w3schools.com/css/default.asp</a> [Accessed 10 OCT.2016]
		</br>
		<b>Brian Proffitt </b>(2013), What APIs are and Why they"re important <i>Readwrite in Hack</i>. Available at <a href="http://readwrite.com/2013/09/19/api-defined/">http://readwrite.com/2013/09/19/api-defined/</a> [Accessed 12 OCT.2016]
		</br>
		<b>Corey Maynard </b>(2013), <i>Creating A RESTful API with PHP</i>, Available at <a href="http://coreymaynard.com/blog/creating-a-restful-api-with-php/">http://coreymaynard.com/blog/creating-a-restful-api-with-php/</a> [Accessed 12 OCT.2016]
		</br>
		<b>phpdelusions </b>(2016), <i>(The only proper) PDO tutorial </i>, Available at <a href="https://phpdelusions.net/pdo">https://phpdelusions.net/pdo</a> [Accessed 18 OCT.2016]
		</br>
		<b>iNADhttps </b> (2015), <i>Sending A GET/POST Request via PHP without CURL</i>, Available at <a href="http://gist.github.com/iNaD/c2c19bcc9bb9e04b1fe8">http://gist.github.com/iNaD/c2c19bcc9bb9e04b1fe8</a> [Accessed 11 NOV.2016]
		</br>
		<b>The PHP group </b> (2001-2016), <i>PHP Documentation</i>, Available at <a href="http://php.net/docs.php"> http://php.net/docs.php </a> [Accessed 10 NOV.2016]
		</p>
		
		<p>
		<b>Marijn Haverbeke</b> (2014), <i>Eloquent JavaScript</i>, 2nd Edition.
		</br>
		<b>Jonathan Chaffer, Karl Swedberg</b> (2014), <i>Learning jQuery</i>, 1st Edition, PACKT Publishing, Birmingham.
		</br>
		<b>Rob Davis</b> (2014), <i>The Wheel: Learning Javascript</i>, Available at <a href="http://unn-isrd1.newnumyspace.co.uk/learn/book/5/chapter/1/page/1">http://unn-isrd1.newnumyspace.co.uk/learn/book/5/chapter/1/page/1</a> [Accessed 10 DEC.2016]
		</br>
		<b>the jQuery Foundation</b> (2016), <i>jQuery</i>, Available at <a href="http://jquery.com/">http://jquery.com/</a>  [Accessed 14 DEC.2016]
		</br>
		<b>the jQuery Foundation</b> (2016), <i>jQuery autocomplete API Documentation</i>, Available at <a href="http://api.jqueryui.com/autocomplete/">http://api.jqueryui.com/autocomplete/</a>  [Accessed 14 DEC.2016]
		</p>
  </div>
  
</div>';

include('includes/footer.html');
