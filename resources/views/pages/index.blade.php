
@extends('layouts.app')

@section('content')

<style>
    img.card-img-top{
        width: 100%;
        height: 150px;
    }
</style>

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row">
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          <div data-aos="zoom-out">
            <h1>Accelerate Your Career With <span>Career Guild</span></h1>
            <h2>A support system for young professionals to connect them with training, online resources, coaching to ace the marketplace, and get access to internship and job opportunities.</h2>
            <div class="text-center text-lg-left">
              <a href="#about" class="btn-get-started scrollto">Know More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
          <img src="https://res.cloudinary.com/pearlsea-advisory/image/upload/v1601561248/careerguild/team/WhatsApp_Image_2020-10-01_at_15.05.33_mxhgqk.jpg" class="img-fluid animated" alt="background" style="border-radius: 10px;">
        </div>
      </div>
    </div>


    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch" data-aos="fade-right">
            {{-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a> --}}
            <a href="#" class="venobox mb-4"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
            <h3>About <span>Us</span></h3>
            <p>55.4% of youths are unemployed and under-employed in Nigeria, 30.7% are between the age of 25 to 34. 2.9 million graduates are unemployed due to a mismatch of skills needed in the jobs available and an unreasonable level of work experience with no opportunity for mentoring at the early phase of their careers.</p>
            <p>We are here to support young professionals to ace their career leveraging training, coaching and internships.
            Our partners include PearlSea Advisory, Axopolitan Movers amongst others.</p>

            <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                <button class="btn btn-info" onclick="location.href='#contact'">Talk to a coach</button> <button class="btn btn-info" onclick="location.href='{{ route('training') }}'">View our training</button>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    @if (count($data[0]['trainingdata']) > 0)



    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <p>Upcoming Programs</p>
        </div>

        <div class="row" data-aos="fade-left">

            @foreach ($data[0]['trainingdata'] as $training)

                <div class="col-lg-4 col-md-4 mt-4 mt-md-0">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="150">
                    <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
                    <h3><a href="{{ route('training') }}">{{ $training->event_name }}</a></h3>
                    </div>
                </div>

            @endforeach


        </div>

      </div>
    </section><!-- End Features Section -->

    @endif

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row" data-aos="fade-up">

          <div class="col-lg-6 col-md-6">
                <div class="text-center">
                    <h3 style="color: #086a6f; font-weight: bold;">Join our mailing list</h3>
                    <p>Get the latest updates concerning your career</p>

                    <form action="{{ route('subscribe') }}" method="post">
                    @csrf
                        <div class="form-group">

                        <input type="text" name="email" class="form-control mb-3 mt-md-0" placeholder="Email address" required>
                        <input type="submit" value="Subscribe" class="form-control"
                        style="background-color: #086a6f; color: white; border-radius: 20px;">
                        </div>
                    </form>
                </div>
          </div>

          <div class="col-lg-6 col-md-6 mt-5 mt-md-0">
                <div class="text-center">
                    <h3 style="color: red; font-weight: bold;">Join our Community</h3>
                    <p>Join the community of career builders to shape your ideas</p>

                    <div class="row">
                        <div class="col-md-6">
                            <a href="https://facebook.com/Careerguild/" target="_blank">
                                <img src="https://img.icons8.com/color/100/000000/facebook-new.png"/>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="https://t.me/careerguild" target="_blank">
                                <img src="https://img.icons8.com/color/100/000000/telegram-app.png"/>
                            </a>
                        </div>
                    </div>

                </div>

          </div>


        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Details Section ======= -->
    <section id="details" class="details">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <p>Our Resource Center</p>
        </div>

        <div class="row content">
          <div class="col-md-4" data-aos="fade-right">
            <img src="https://res.cloudinary.com/pearlsea-advisory/image/upload/v1601559824/careerguild/team/undraw_social_girl_562b_lieovd.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-8 pt-4" data-aos="fade-up">
            <h3>Video Resources</h3>
            <p>
              At Career Guild, we ensure and guarantee you with a lot of video resource from all over the world, with our partners, mentors, colleagues as well as other career builders to facilitate in this journey. Click the button below to watch.
            </p>
            <a href="https://facebook.com/pg/Careerguild/videos/?ref=page_internal" type="button" class="btn btn-primary" target="_blank"><i class="fab fa-facebook-f"></i> Access video resource</a>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
            <img src="https://res.cloudinary.com/pearlsea-advisory/image/upload/v1601560161/careerguild/team/undraw_youtube_tutorial_2gn3_1_zov6oh.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
            <h3>Coaching Sessions</h3>
            <p>
              Do you want to unlock your own potentials and maximize your performance? Career Guild is the right foundation for you. Click on the button below to journey through our coaching session series with our team.
            </p>
            <a href="https://www.youtube.com/channel/UCultJRIkFp694_jw8WJXCJQ" type="button" class="btn btn-danger" target="_blank"><i class="fab fa-youtube"></i> Access coaching session</a>
          </div>
        </div>


        <div class="row content">
          <div class="col-md-4" data-aos="fade-right">
            <img src="https://res.cloudinary.com/pearlsea-advisory/image/upload/v1602023544/careerguild/site/undraw_home_cinema_l7yl_nl1dxk.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-8 pt-4" data-aos="fade-up">
            <h3>Career Starter Series</h3>
            <p>
              Choosing your career at an early life stage is a paramount decision to make. Why not join our CSS5 series as we journey together to the right path to your career.
            </p>
            <a href="{{ route('careerstater') }}" type="button" class="btn btn-info"><i class="fas fa-blog"></i> Access Career Starter Series</a>
          </div>
        </div>






      </div>
    </section><!-- End Details Section -->



    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery disp-0">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Gallery</h2>
          <p>Check our Gallery</p>
        </div>

        <div class="row no-gutters" data-aos="fade-left">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
              <a href="{{ asset('assets/img/gallery/gallery-1.jpg') }}" class="venobox" data-gall="gallery-item">
                <img src="{{ asset('assets/img/gallery/gallery-1.jpg') }}" alt="gallery-1" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="150">
              <a href="{{ asset('assets/img/gallery/gallery-2.jpg') }}" class="venobox" data-gall="gallery-item">
                <img src="{{ asset('assets/img/gallery/gallery-2.jpg') }}" alt="gallery-2" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200">
              <a href="{{ asset('assets/img/gallery/gallery-3.jpg') }}" class="venobox" data-gall="gallery-item">
                <img src="{{ asset('assets/img/gallery/gallery-3.jpg') }}" alt="gallery-3" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="250">
              <a href="{{ asset('assets/img/gallery/gallery-4.jpg') }}" class="venobox" data-gall="gallery-item">
                <img src="{{ asset('assets/img/gallery/gallery-4.jpg') }}" alt="gallery-4" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
              <a href="{{ asset('assets/img/gallery/gallery-5.jpg') }}" class="venobox" data-gall="gallery-item">
                <img src="{{ asset('assets/img/gallery/gallery-5.jpg') }}" alt="gallery-5" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="350">
              <a href="{{ asset('assets/img/gallery/gallery-6.jpg') }}" class="venobox" data-gall="gallery-item">
                <img src="{{ asset('assets/img/gallery/gallery-6.jpg') }}" alt="gallery-6" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="400">
              <a href="{{ asset('assets/img/gallery/gallery-7.jpg') }}" class="venobox" data-gall="gallery-item">
                <img src="{{ asset('assets/img/gallery/gallery-7.jpg') }}" alt="gallery-7" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="450">
              <a href="{{ asset('assets/img/gallery/gallery-8.jpg') }}" class="venobox" data-gall="gallery-item">
                <img src="{{ asset('assets/img/gallery/gallery-8.jpg') }}" alt="gallery-8" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="owl-carousel testimonials-carousel" data-aos="zoom-in">

          <div class="testimonial-item">
            <img src="https://res.cloudinary.com/pearlsea-advisory/image/upload/v1601509170/careerguild/team/undraw_profile_pic_ic5t_ygfmbw.png" class="testimonial-img" alt="testimonials-1">
            <h3>Ebenezer Adesoro</h3>
            <h4>International Breweries Imo Ilesa Forklift dpt</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              The impact of the Employability nugget on me was so powerful because I learnt how to become a better version of my self by harnessing opportunities and working as a team to achieve a goal. I really enjoyed the nuggets from the panelist session on things to look out for in my next employment letter.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>

          <div class="testimonial-item">
            <img src="https://res.cloudinary.com/pearlsea-advisory/image/upload/v1601509170/careerguild/team/undraw_profile_pic_ic5t_ygfmbw.png" class="testimonial-img" alt="testimonials-2">
            <h3>Funmilayo Ajayi</h3>
            <h4>Axopolitan Moving, Customer care Agent</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              It was an insightful session and addressed employability issues from the root to the top. Understanding and knowing yourself are crucial if you want to experience growth & development in any situation/ work environment you find yourself in. I was able to learn new ways to leverage technology to sell myself to the outside world and how to properly write my CV. Most importantly, I had to align with my mind set and attitudes in achieving my desired goals.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>

        </div>

      </div>
    </section><!-- End Testimonials Section -->

    @if (count($data[0]['teamdata']) > 0)


    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Team</h2>
          <p>Our Great Team</p>
        </div>

        <div class="row" data-aos="fade-left">

            @foreach ($data[0]['teamdata'] as $team)
                <div class="col-lg-3 col-md-6">
                    <div class="member" data-aos="zoom-in" data-aos-delay="100">
                    <div class="pic"><img src="{{ $team->image }}" class="img-fluid" alt="team-1" style="height: 350px !important; object-fit: cover;"></div>
                    <div class="member-info">
                        <h4>{{ $team->name }}</h4>
                        <span>{{ $team->position }}</span>
                        <div class="social">

                            @if ($team->twitter != "")
                                <a href="{{ $team->twitter }}"><i class="icofont-twitter"></i></a>
                            @endif
                            @if ($team->facebook != "")
                                <a href="{{ $team->facebook }}"><i class="icofont-facebook"></i></a>
                            @endif
                            @if ($team->instagram != "")
                                <a href="{{ $team->instagram }}"><i class="icofont-instagram"></i></a>
                            @endif
                            @if ($team->youtube != "")
                                <a href="{{ $team->youtube }}"><i class="icofont-youtube"></i></a>
                            @endif

                        </div>
                    </div>
                    </div>
                </div>
            @endforeach



        </div>

        @if (count($data[0]['teamdata']) > 6)
        <br><br>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center"><a href="{{ route('teammember') }}" type="button" class="btn btn-info"> View all</a></div>
            </div>
        </div>
        @endif

      </div>
    </section><!-- End Team Section -->

    @endif


    @if (count($data[0]['blogdata']) > 0)



    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Blog</h2>
          <p>Articles & Blog Posts</p>
        </div>

        <div class="row" data-aos="fade-left">

            @foreach ($data[0]['blogdata'] as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="box" data-aos="zoom-in" data-aos-delay="100">
                    <div class="card" style="width: 100%;">
                        <img src="{{ $blog->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 style="text-align:left; font-weight: bold; color: #086a6f">{{ $blog->subject }}<br><small> Time: {{ $blog->created_at->diffForHumans() }}</small></h6><hr>
                            <p class="card-text">

                                <?php $string = $blog->message; $output = strlen($string) > 195 ? substr($string,0,195)."..." : $string;?>

                                    {!! $output !!}

                            </p>
                        </div>
                        </div>
                    <div class="btn-wrap">
                        <a href="/blogdetail/{{ $blog->id }}" class="btn-buy" style="background-color: #086a6f">Continue reading</a>
                    </div>
                    </div>
                </div>

            @endforeach


        </div>
        @if (count($data[0]['blogdata']) > 3)
        <br><br>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center"><a href="{{ route('blog') }}" class="btn-buy" style="background-color: #086a6f"> View all</a></div>
            </div>
        </div>
        @endif

      </div>
    </section><!-- End Pricing Section -->


    @endif

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1">Our target audience <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                <p>
                  Our primary audience are fresh graduates awaiting NYSC. Others are final year students in universities and young professionals within 1-5 years in their industry.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">Do we review CVs for young professionals? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                <p>
                  Absolutely, we have reviewed over 50 CVs for young professionals and 25% landed their dream job afterwards. You can reach out to us for support.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed">How often do you send emails if we subscribe? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                <p>
                  Our commitment is twice in a month. We want to send you the best content to ace your career as well as not spamming you with unnecessary content.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4" class="collapsed">What programs do you have? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                <p>
                  Career Guild Campus Seminar: Career Guild Campus Seminar is targeted at undergraduates. The objective is to equip their minds with the right information and necessary skills, both soft and hard skills, required in their career. There will be discussions on after campus realities and scenarios by some of our associates.
                </p>
                <p>
                  Career Guild Online Training: Career Guild Online Training is our resource platform where young professionals have access to resources and opportunities to grow and reposition in their career. Resources such as Videos, Books, Information, links, intellectual questions etc.
                </p>
                <p>
                  Career Guild Coaching Hub: Career Guild Coaching Hub is where people are connected with coaches for a month to a maximum of three months in the area of their career, monitoring their career growth and achieving their coaching goals.
                </p>
                <p>
                  Career Guild Internship Program: Career Guild Internship Program is a three months to a year hands-on experience with our partner companies in grooming young professionals in their career to ace the marketplace.
                    It is a journey. So, it is not everyone that will qualify for this.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed">How can we support? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                <p>
                  You can support our work by volunteering to be a coach to other young professionals or a volunteer member in any team. Kindly fill the form. You can also support us financially by sending a mail to <a href="mailto:support@careerguild.com.ng">support@careerguild.com.ng</a>
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End F.A.Q Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>

        <div class="row">

          <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>Palmgroove Lagos, Nigeria</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>contact@careerguild.com.ng</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">

            <form action="{{ route('contactus') }}" method="post" class="php-email-form">
                @csrf
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" / required>
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" / required>
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number" data-rule="minlen:4" data-msg="Please enter your phone number" / required>
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" / required>
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message" required></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

@endsection


