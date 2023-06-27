@extends('web.layout.app')

@section('title', 'Home')

@section('content')
<!-- Banner Section start here -->
<section class="banner-section pb-0">
	<div class="banner-area">
		<div class="container">
			<div class="row no-gutters align-items-center justify-content-center">
				<div class="col-12">
					<div class="content-part text-center">
						<div class="section-header">
							<h2>COVID-19 Tracker</h2>
							<h3>Total Confirmed Corona Cases</h3>
							<h2 class="count-people">960708</h2>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="section-wrapper">
						<div class="banner-thumb">
							<img src="assets/images/banner/01.png" alt="lab-banner">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Banner Section ending here -->

<!-- corona count section start here -->
<section class="corona-count-section bg-corona padding-tb pt-0">
	<div class="container">
		<div class="corona-wrap">
			<div class="corona-count-top wow fadeInUp" data-wow-delay="0.3s">
				<div class="row justify-content-center align-items-center">
					<div class="col-xl-3 col-md-6 col-12">
						<h5>Total Corona Statistics :</h5>
					</div>
					<div class="col-xl-3 col-md-6 col-12">
						<div class="corona-item">
							<div class="corona-inner">
								<div class="corona-thumb">
									<img src="assets/images/corona/01.png" alt="corona">
								</div>
								<div class="corona-content">
									<h3 class="count-number">262774</h3>
									<p>Active Cases</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 col-12">
						<div class="corona-item">
							<div class="corona-inner">
								<div class="corona-thumb">
									<img src="assets/images/corona/02.png" alt="corona">
								</div>
								<div class="corona-content">
									<h3 class="count-number">125050</h3>
									<p>Recovered Cases</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 col-12">
						<div class="corona-item">
							<div class="corona-inner">
								<div class="corona-thumb">
									<img src="assets/images/corona/03.png" alt="corona">
								</div>
								<div class="corona-content">
									<h3 class="count-number">16558</h3>
									<p>Deaths</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="corona-count-bottom">
				<div class="row justify-content-center align-items-center     flex-row-reverse">
					<div class="col-lg-6 col-12 wow fadeInRight" data-wow-delay="0.4s">
						<div class="ccb-thumb">
							<a href="https://www.youtube.com/embed/Z9fQTS_kEqw" data-rel="lightcase" class="ccb-video"><i class="icofont-ui-play"></i><span class="pluse_1"></span><span class="pluse_2"></span></a>
							<img src="assets/images/corona/01.jpg" alt="corona">
						</div>
					</div>
					<div class="col-lg-6 col-12 wow fadeInLeft" data-wow-delay="0.5s">
						<div class="ccb-content">
							<h2>What Is Coronavirus?</h2>
							<h6>Coronavirus COVID-19 Global Cases map developed by the Johns Hopkins Center for Systems Science and Engineering.</h6>
							<p>Coronaviruses are type of virus. There are many different kinds, & some cause disease newly identified type has caused recent outbreak of respiratory ilnessnow called COVID-19 that started in China.</p>
							<ul class="lab-ul">
								<li><i class="icofont-tick-mark"></i>COVID-19 is the disease caused by the new coronavirus that emerged in China in December 2020.</li>
								<li><i class="icofont-tick-mark"></i>COVID-19 symptoms include cough, fever and shortness of breath. COVID-19 can be severe, and some cases have caused death.</li>
								<li><i class="icofont-tick-mark"></i>The new coronavirus can be spread from person to person. It is diagnosed with a laboratory test.</li>
							</ul>
							<a href="#" class="lab-btn style-2"><span>get started Now</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- corona count section ending here -->

<!-- Service Section Start Here -->
<section class="service-section bg-service padding-tb">
	<div class="service-shape">
		<div class="shape shape-1">
			<img src="assets/images/service/shape/01.png" alt="service-shape">
		</div>
		<div class="shape shape-2">
			<img src="assets/images/service/shape/01.png" alt="service-shape">
		</div>
	</div>
	<div class="container">
		<div class="section-header wow fadeInUp" data-wow-delay="0.3s">
			<h2>Corona Virus Symptoms</h2>
			<p> Dynamically formulate fully tested catalysts for change via focused methods of empowerment Assertively extend alternative synergy and extensive web services.</p>
		</div>
		<div class="section-wrapper">
			<div class="row justify-content-center">
				<div class="col-xl-4 col-md-6 col-12 wow fadeInUp" data-wow-delay="0.3s">
					<div class="service-item text-center">
						<div class="service-inner">
							<div class="service-thumb">
								<img src="assets/images/service/01.jpg" alt="service">
							</div>
							<div class="service-content">
								<h4>Coughing And Sneezing</h4>
								<p>Our comprehensive Online Marketing strategy will boost your website trafic hence monthly sales.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6 col-12 wow fadeInUp" data-wow-delay="0.4s">
					<div class="service-item text-center">
						<div class="service-inner">
							<div class="service-thumb">
								<img src="assets/images/service/02.jpg" alt="service">
							</div>
							<div class="service-content">
								<h4>Hot Fever</h4>
								<p>Our comprehensive Online Marketing strategy will boost your website trafic hence monthly sales.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6 col-12 wow fadeInUp" data-wow-delay="0.5s">
					<div class="service-item text-center">
						<div class="service-inner">
							<div class="service-thumb">
								<img src="assets/images/service/03.jpg" alt="service">
							</div>
							<div class="service-content">
								<h4>Strong Headacke</h4>
								<p>Our comprehensive Online Marketing strategy will boost your website trafic hence monthly sales.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6 col-12 wow fadeInUp" data-wow-delay="0.6s">
					<div class="service-item text-center">
						<div class="service-inner">
							<div class="service-thumb">
								<img src="assets/images/service/04.jpg" alt="service">
							</div>
							<div class="service-content">
								<h4>Shortness Of Breath</h4>
								<p>Our comprehensive Online Marketing strategy will boost your website trafic hence monthly sales.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6 col-12 wow fadeInUp" data-wow-delay="0.7s">
					<div class="service-item text-center">
						<div class="service-inner">
							<div class="service-thumb">
								<img src="assets/images/service/05.jpg" alt="service">
							</div>
							<div class="service-content">
								<h4>Confusion</h4>
								<p>Our comprehensive Online Marketing strategy will boost your website trafic hence monthly sales.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6 col-12 wow fadeInUp" data-wow-delay="0.8s">
					<div class="service-item text-center">
						<div class="service-inner">
							<div class="service-thumb">
								<img src="assets/images/service/06.jpg" alt="service">
							</div>
							<div class="service-content">
								<h4>Sore Throat</h4>
								<p>Our comprehensive Online Marketing strategy will boost your website trafic hence monthly sales.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Service Section Ending Here -->

<!-- Team Member Section Start here -->
<div class="team-section bg-team padding-tb">
	<div class="container">
		<div class="section-header wow fadeInUp" data-wow-delay="0.3s">
			<h2>Meet Our Best Doctors</h2>
			<p> Dynamically formulate fully tested catalysts for change via focused methods of empowerment Assertively extend alternative synergy and extensive web services.</p>
		</div>
		<div class="team-area">
			<div class="row justify-content-center align-items-center">
				<div class="col-xl-4 col-md-6 col-12 wow fadeInUp" data-wow-delay="0.3s">
					<div class="team-item">
						<div class="team-item-inner">
							<div class="team-thumb">
								<img src="assets/images/team/01.jpg" alt="team-membar">
							</div>
							<div class="team-content">
								<h5 class="member-name">Dorothy M. Nickell</h5>
								<span class="member-dagi">Throat Specialist</span>
								<p class="member-details">Proce Aran Manu Proucs Rahe Conen Cuve Manu Produ Rahe Cuvaes Mana The Conen Testin Motin Was Procedur</p>
								<ul class="icon-style-list lab-ul">
									<li><i class="icofont-phone"></i><span>+880 1234 567 890</span></li>
									<li><i class="icofont-envelope"></i><span>d.m.nickell@gmail.com</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6 col-12 wow fadeInUp" data-wow-delay="0.4s">
					<div class="team-item">
						<div class="team-item-inner">
							<div class="team-thumb">
								<img src="assets/images/team/02.jpg" alt="team-membar">
							</div>
							<div class="team-content">
								<h5 class="member-name">Billie R. Courtney</h5>
								<span class="member-dagi">Cardiologist</span>
								<p class="member-details">Proce Aran Manu Proucs Rahe Conen Cuve Manu Produ Rahe Cuvaes Mana The Conen Testin Motin Was Procedur</p>
								<ul class="icon-style-list lab-ul">
									<li><i class="icofont-phone"></i><span>+880 1234 567 890</span></li>
									<li><i class="icofont-envelope"></i><span>b.r.courtney@gmail.com</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6 col-12 wow fadeInUp" data-wow-delay="0.5s">
					<div class="team-item">
						<div class="team-item-inner">
							<div class="team-thumb">
								<img src="assets/images/team/03.jpg" alt="team-membar">
							</div>
							<div class="team-content">
								<h5 class="member-name">Courtney A. Smith</h5>
								<span class="member-dagi">Rehabilitation Therapy</span>
								<p class="member-details">Proce Aran Manu Proucs Rahe Conen Cuve Manu Produ Rahe Cuvaes Mana The Conen Testin Motin Was Procedur</p>
								<ul class="icon-style-list lab-ul">
									<li><i class="icofont-phone"></i><span>+880 1234 567 890</span></li>
									<li><i class="icofont-envelope"></i><span>c.a.smith@gmail.com</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Team Member Section Ending here -->

<!-- safe actions section start here -->
<section class="safe-actions padding-tb bg-action">
	<div class="action-shape">
		<img src="assets/images/safe/shape/01.png" alt="action-shape">
	</div>
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-lg-6 col-12 wow fadeInUp" data-wow-delay="0.3s">
				<div class="sa-thumb-part">
					<div class="safe-thumb">
						<img src="assets/images/safe/01.jpg" alt="safe-actions">
						<div class="shape-icon">
							<div class="sa-icon sa-green saicon-1">
								<img src="assets/images/safe/shape/green/01.png" alt="green-signal">
								<div class="saicon-content">
									<p>Coronaviruses (CoV) are a large family of viruses that cause illness ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS-CoV) and Severe Acute Respiratory Syndrome (SARS-CoV).</p>
								</div>
							</div>
							<div class="sa-icon sa-green saicon-2">
								<img src="assets/images/safe/shape/green/02.png" alt="green-signal">
								<div class="saicon-content">
									<p>Coronaviruses (CoV) are a large family of viruses that cause illness ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS-CoV) and Severe Acute Respiratory Syndrome (SARS-CoV).</p>
								</div>
							</div>
							<div class="sa-icon sa-green saicon-3">
								<img src="assets/images/safe/shape/green/03.png" alt="green-signal">
								<div class="saicon-content">
									<p>Coronaviruses (CoV) are a large family of viruses that cause illness ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS-CoV) and Severe Acute Respiratory Syndrome (SARS-CoV).</p>
								</div>
							</div>
							<div class="sa-icon sa-green saicon-4">
								<img src="assets/images/safe/shape/green/04.png" alt="green-signal">
								<div class="saicon-content">
									<p>Coronaviruses (CoV) are a large family of viruses that cause illness ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS-CoV) and Severe Acute Respiratory Syndrome (SARS-CoV).</p>
								</div>
							</div>
							<div class="sa-icon sa-green saicon-5">
								<img src="assets/images/safe/shape/green/05.png" alt="green-signal">
								<div class="saicon-content">
									<p>Coronaviruses (CoV) are a large family of viruses that cause illness ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS-CoV) and Severe Acute Respiratory Syndrome (SARS-CoV).</p>
								</div>
							</div>
							<div class="sa-icon sa-red saicon-6">
								<img src="assets/images/safe/shape/red/01.png" alt="red-signal">
								<div class="saicon-content">
									<p>Coronaviruses (CoV) are a large family of viruses that cause illness ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS-CoV) and Severe Acute Respiratory Syndrome (SARS-CoV).</p>
								</div>
							</div>
							<div class="sa-icon sa-red saicon-7">
								<img src="assets/images/safe/shape/red/02.png" alt="red-signal">
								<div class="saicon-content">
									<p>Coronaviruses (CoV) are a large family of viruses that cause illness ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS-CoV) and Severe Acute Respiratory Syndrome (SARS-CoV).</p>
								</div>
							</div>
							<div class="sa-icon sa-red saicon-8">
								<img src="assets/images/safe/shape/red/03.png" alt="red-signal">
								<div class="saicon-content">
									<p>Coronaviruses (CoV) are a large family of viruses that cause illness ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS-CoV) and Severe Acute Respiratory Syndrome (SARS-CoV).</p>
								</div>
							</div>
							<div class="sa-icon sa-red saicon-9">
								<img src="assets/images/safe/shape/red/04.png" alt="red-signal">
								<div class="saicon-content">
									<p>Coronaviruses (CoV) are a large family of viruses that cause illness ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS-CoV) and Severe Acute Respiratory Syndrome (SARS-CoV).</p>
								</div>
							</div>
							<div class="sa-icon sa-red saicon-10">
								<img src="assets/images/safe/shape/red/05.png" alt="red-signal">
								<div class="saicon-content">
									<p>Coronaviruses (CoV) are a large family of viruses that cause illness ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS-CoV) and Severe Acute Respiratory Syndrome (SARS-CoV).</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-12 wow fadeInUp" data-wow-delay="0.4s">
				<div class="sa-content-part">
					<h2>How to stay Safe Important Percautions</h2>
					<p>Continuay seize magnetic oportunities via value added imperatives ompetenty plagiarize customized meta-services after interopera supply chains nthuastica embrace portals through high-payoff internal or "organic" sources rogressively engineer cross functional synergy with client-centric </p>
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="sa-title">
								<h6><i class="icofont-checked"></i>Things You Should Do</h6>
							</div>
							<ul class="lab-ul">
								<li><i class="icofont-check-circled"></i>Stay at Home</li>
								<li><i class="icofont-check-circled"></i>Wear Mask</li>
								<li><i class="icofont-check-circled"></i>Wash Your Hands</li>
								<li><i class="icofont-check-circled"></i>Well Done Cooking</li>
								<li><i class="icofont-check-circled"></i>Seek for a Doctor</li>
								<li><i class="icofont-check-circled"></i>Avoid Crowed Places</li>
							</ul>
						</div>
						<div class="col-lg-6 col-12">
							<div class="sa-title">
								<h6><i class="icofont-not-allowed"></i>Things You Should Avoid</h6>
							</div>
							<ul class="lab-ul">
								<li><i class="icofont-close-circled"></i>Stay at Home</li>
								<li><i class="icofont-close-circled"></i>Wear Mask</li>
								<li><i class="icofont-close-circled"></i>Wash Your Hands</li>
								<li><i class="icofont-close-circled"></i>Well Done Cooking</li>
								<li><i class="icofont-close-circled"></i>Seek for a Doctor</li>
								<li><i class="icofont-close-circled"></i>Avoid Crowed Places</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- safe actions section ending here -->

<!-- faq section start here -->
<section class="faq-section bg-faq padding-tb">
	<div class="faq-shape">
		<img src="assets/images/faq/shape/01.png" alt="action-shape">
	</div>
	<div class="container">
		<div class="section-header wow fadeInUp" data-wow-delay="0.3s">
			<h2>Friquently Ask Questions</h2>
			<p> Dynamically formulate fully tested catalysts for change via focused methods of empowerment Assertively extend alternative synergy and extensive web services.</p>
		</div>
		<div class="section-wrapper wow fadeInUp" data-wow-delay="0.4s">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-sm-8 col-12">
					<ul class="accordion lab-ul">
						<li class="accordion-item">
							<div class="accordion-list">
								<div class="left">
									<div class="icon"><i class="icofont-info"></i></div>
								</div>
								<div class="right">
									<h6>What are the objectives of this Website?</h6>
								</div>
							</div>
							<div class="accordion-answer">
								<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore vertatis et quasi archtecto beatae vitae dicta sunt explicab Nemo enim ipsam voluptatem quia voluptas.</p>
							</div>
						</li>
						<li class="accordion-item">
							<div class="accordion-list">
								<div class="left">
									<div class="icon"><i class="icofont-info"></i></div>
								</div>
								<div class="right">
									<h6>What is the best features and services we deiver?</h6>
								</div>
							</div>
							<div class="accordion-answer">
								<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore vertatis et quasi archtecto beatae vitae dicta sunt explicab Nemo enim ipsam voluptatem quia voluptas.</p>
							</div>
						</li>
						<li class="accordion-item">
							<div class="accordion-list">
								<div class="left">
									<div class="icon"><i class="icofont-info"></i></div>
								</div>
								<div class="right">
									<h6>Why this Prevention important to me?</h6>
								</div>
							</div>
							<div class="accordion-answer">
								<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore vertatis et quasi archtecto beatae vitae dicta sunt explicab Nemo enim ipsam voluptatem quia voluptas.</p>
							</div>
						</li>
						<li class="accordion-item">
							<div class="accordion-list">
								<div class="left">
									<div class="icon"><i class="icofont-info"></i></div>
								</div>
								<div class="right">
									<h6>how may I take part in and purchase this?</h6>
								</div>
							</div>
							<div class="accordion-answer">
								<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore vertatis et quasi archtecto beatae vitae dicta sunt explicab Nemo enim ipsam voluptatem quia voluptas.</p>
							</div>
						</li>
						<li class="accordion-item">
							<div class="accordion-list">
								<div class="left">
									<div class="icon"><i class="icofont-info"></i></div>
								</div>
								<div class="right">
									<h6>What kinds of security policy do you maintain?</h6>
								</div>
							</div>
							<div class="accordion-answer">
								<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore vertatis et quasi archtecto beatae vitae dicta sunt explicab Nemo enim ipsam voluptatem quia voluptas.</p>
							</div>
						</li>
					</ul>
				</div>
				<div class="col-lg-6 col-sm-8 col-12">
					<ul class="accordion lab-ul">
						<li class="accordion-item">
							<div class="accordion-list">
								<div class="left">
									<div class="icon"><i class="icofont-info"></i></div>
								</div>
								<div class="right">
									<h6>Get things done with this beautiful app?</h6>
								</div>
							</div>
							<div class="accordion-answer">
								<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore vertatis et quasi archtecto beatae vitae dicta sunt explicab Nemo enim ipsam voluptatem quia voluptas.</p>
							</div>
						</li>
						<li class="accordion-item">
							<div class="accordion-list">
								<div class="left">
									<div class="icon"><i class="icofont-info"></i></div>
								</div>
								<div class="right">
									<h6>Starting with Aviki is easier than anything?</h6>
								</div>
							</div>
							<div class="accordion-answer">
								<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore vertatis et quasi archtecto beatae vitae dicta sunt explicab Nemo enim ipsam voluptatem quia voluptas.</p>
							</div>
						</li>
						<li class="accordion-item">
							<div class="accordion-list">
								<div class="left">
									<div class="icon"><i class="icofont-info"></i></div>
								</div>
								<div class="right">
									<h6>20k+ Customers Love Aviki App?</h6>
								</div>
							</div>
							<div class="accordion-answer">
								<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore vertatis et quasi archtecto beatae vitae dicta sunt explicab Nemo enim ipsam voluptatem quia voluptas.</p>
							</div>
						</li>
						<li class="accordion-item">
							<div class="accordion-list">
								<div class="left">
									<div class="icon"><i class="icofont-info"></i></div>
								</div>
								<div class="right">
									<h6>Whatever Work You Do You Can Do It In Aviki?</h6>
								</div>
							</div>
							<div class="accordion-answer">
								<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore vertatis et quasi archtecto beatae vitae dicta sunt explicab Nemo enim ipsam voluptatem quia voluptas.</p>
							</div>
						</li>
						<li class="accordion-item">
							<div class="accordion-list">
								<div class="left">
									<div class="icon"><i class="icofont-info"></i></div>
								</div>
								<div class="right">
									<h6>Download our guide manage your daily works?</h6>
								</div>
							</div>
							<div class="accordion-answer">
								<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore vertatis et quasi archtecto beatae vitae dicta sunt explicab Nemo enim ipsam voluptatem quia voluptas.</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- faq section ending here -->

<!-- Blog Section Start Here -->
<section class="blog-section bg-blog padding-tb">
	<div class="container">
		<div class="section-header wow fadeInUp" data-wow-delay="0.3s">
			<h2>Our Most Popular Blog</h2>
			<p> Dynamically formulate fully tested catalysts for change via focused methods of empowerment Assertively extend alternative synergy and extensive web services.</p>
		</div>
		<div class="section-wrapper">
			<div class="row justify-content-center">
				<div class="col-lg-4 col-sm-6 col-12 wow fadeInUp" data-wow-delay="0.3s">
					<div class="post-item">
						<div class="post-item-inner">
							<div class="post-thumb">
								<a href="#"><img src="assets/images/blog/01.jpg" alt="lab-blog"></a>
							</div>
							<div class="post-content">
								<h5><a href="#">Conulting Reporting Qouncil Arei 
									Not Could More...</a></h5>
								<div class="author-date">
									<a href="#" class="date"><i class="icofont-calendar"></i>July 12, 2020</a>
									<a href="#" class="admin"><i class="icofont-ui-user"></i>Somrat Islam</a>
								</div>
								<p>Pluoresntly customize pranci an plcentered  customer service anding strategic amerials Interacvely cordinate performe</p>
								<div class="post-footer">
									<a href="#" class="text-btn">Read More<i class="icofont-double-right"></i></a>
									<a href="#" class="comments"><i class="icofont-comment"></i><span>2</span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 col-12 wow fadeInUp" data-wow-delay="0.4s">
					<div class="post-item">
						<div class="post-item-inner">
							<div class="post-thumb">
								<a href="#"><img src="assets/images/blog/02.jpg" alt="lab-blog"></a>
							</div>
							<div class="post-content">
								<h5><a href="#">Financial Reporting Qouncil What Could More...</a></h5>
								<div class="author-date">
									<a href="#" class="date"><i class="icofont-calendar"></i>July 12, 2020</a>
									<a href="#" class="admin"><i class="icofont-ui-user"></i>Somrat Islam</a>
								</div>
								<p>Pluoresntly customize pranci an plcentered  customer service anding strategic amerials Interacvely cordinate performe</p>
								<div class="post-footer">
									<a href="#" class="text-btn">Read More<i class="icofont-double-right"></i></a>
									<a href="#" class="comments"><i class="icofont-comment"></i><span>2</span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 col-12 wow fadeInUp" data-wow-delay="0.5s">
					<div class="post-item">
						<div class="post-item-inner">
							<div class="post-thumb">
								<a href="#"><img src="assets/images/blog/03.jpg" alt="lab-blog"></a>
							</div>
							<div class="post-content">
								<h5><a href="#">Consulting Reporting Qounc Arei Could More...</a></h5>
								<div class="author-date">
									<a href="#" class="date"><i class="icofont-calendar"></i>July 12, 2020</a>
									<a href="#" class="admin"><i class="icofont-ui-user"></i>Somrat Islam</a>
								</div>
								<p>Pluoresntly customize pranci an plcentered  customer service anding strategic amerials Interacvely cordinate performe</p>
								<div class="post-footer">
									<a href="#" class="text-btn">Read More<i class="icofont-double-right"></i></a>
									<a href="#" class="comments"><i class="icofont-comment"></i><span>2</span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Blog Section Ending Here -->

<!-- Sponsor Section Start Here -->
<div class="sponsor-section">
	<div class="container">
		<div class="section-wrapper wow fadeInUp" data-wow-delay="0.3s">
			<div class="sponsor-slider">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<div class="sponsor-item">
							<div class="sponsor-thumb">
								<a href="#"><img src="assets/images/sponsor/01.png" alt="lab-sponsor"></a>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="sponsor-item">
							<div class="sponsor-thumb">
								<a href="#"><img src="assets/images/sponsor/02.png" alt="lab-sponsor"></a>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="sponsor-item">
							<div class="sponsor-thumb">
								<a href="#"><img src="assets/images/sponsor/03.png" alt="lab-sponsor"></a>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="sponsor-item">
							<div class="sponsor-thumb">
								<a href="#"><img src="assets/images/sponsor/04.png" alt="lab-sponsor"></a>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="sponsor-item">
							<div class="sponsor-thumb">
								<a href="#"><img src="assets/images/sponsor/05.png" alt="lab-sponsor"></a>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="sponsor-item">
							<div class="sponsor-thumb">
								<a href="#"><img src="assets/images/sponsor/06.png" alt="lab-sponsor"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Sponsor Section Ending Here -->
@endsection