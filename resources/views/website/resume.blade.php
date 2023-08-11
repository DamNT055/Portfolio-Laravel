@extends('website.layout')
@section('content_website')
<!-- About -->
<div class="pb-3">
    <h1 class="title title--h1 title__separate">Resume</h1>
</div>

<!-- Experience -->
<div class="pb-0">
    <div class="row">
        <div class="col-12 col-lg-6">
            <h2 class="title title--h3"><img class="title-icon" src="{{asset('frontend/icons/icon-experience.svg')}}" alt="" /> Experience</h2>
            <div class="timeline">
                
                <!-- Item -->
                <article class="timeline__item">
                    <h5 class="title title--h5 timeline__title">Freelance - sachsanhxanh.site</h5>
                    <span class="timeline__period">5/2023 — 7/2023</span>
                    <p class="timeline__description">Develop an E-commerce website selling snacks using MySQL, PHP based on Codeighter framework.</p>
                </article>

                <!-- Item -->
                <article class="timeline__item">
                    <h5 class="title title--h5 timeline__title">PHP Developer - TGA Joint Stock company</h5>
                    <span class="timeline__period">9/2022 — 5/2023</span>
                    <p class="timeline__description" style="margin-bottom: 0;">Participating in programming and developing support systems for the MIA.vn retail chain's business:
                        <ul>
                            <li>Internal management system ERP, HRM, CRM,...</li>
                            <li>Sales website system.</li>
                        </ul>
                    </p>
                    
                </article>

                <!-- Item -->
                <article class="timeline__item">
                    <h5 class="title title--h5 timeline__title">Freelance - the2percenter.com</h5>
                    <span class="timeline__period">1/2023 — 2/2023</span>
                    <p class="timeline__description">Designing and implementing the front-end using HTML, CSS, jQuery, Bootstrap. Building CMS system using PHP, MySQL based on Codeighter framework.</p>
                </article>

                <!-- Item -->
                <article class="timeline__item">
                    <h5 class="title title--h5 timeline__title">AI Engineer Intern - FPT Software</h5>
                    <span class="timeline__period">9/2022 — 12/2022</span>
                    <p class="timeline__description">Collect and label data for the SoundAI project.<br>           Equip yourself with more knowledge about AI and code under the guidance of teamleader</p>
                </article>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <h2 class="title title--h3"><img class="title-icon" src="{{asset('frontend/icons/icon-education.svg')}}" alt="" /> Education</h2>
            <div class="timeline">
                <!-- Item -->
                <article class="timeline__item">
                    <h5 class="title title--h5 timeline__title">FPT University</h5>
                    <span class="timeline__period">2019 — 2023</span>
                    <p class="timeline__description">Bachelor in Artificial Intelligence - Final year.</p>
                </article>

                <!-- Item -->
                <article class="timeline__item">
                    <h5 class="title title--h5 timeline__title">Le Quy Don High School for Gifted students in Binh Dinh</h5>
                    <span class="timeline__period">2016 — 2019</span>
                    <p class="timeline__description">Student of the 18th class specializing in physics.</p>
                </article>
            </div>
        </div>
    </div>
</div>

<!-- Skills -->
<div class="box-inner box-inner--rounded">
    <div class="row">
        <div class="col-12 col-lg-6">
            <h2 class="title title--h3">Code Skills</h2>
            <div class="box box__second">
                <!-- Progress -->
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-text"><span>PHP</span><span>70%</span></div>
                    </div>
                    <div class="progress-text"><span>PHP</span></div>
                </div>

                <!-- Progress -->
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-text"><span>Python</span><span>80%</span></div>
                    </div>
                    <div class="progress-text"><span>Python</span></div>
                </div>


                <!-- Progress -->
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-text"><span>Javascript</span><span>65%</span></div>
                    </div>
                    <div class="progress-text"><span>Javascript</span></div>
                </div>

                <!-- Progress -->
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-text"><span>HTML</span><span>90%</span></div>
                    </div>
                    <div class="progress-text"><span>HTML</span></div>
                </div>

                <!-- Progress -->
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-text"><span>CSS</span><span>60%</span></div>
                    </div>
                    <div class="progress-text"><span>CSS</span></div>
                </div>


            </div>
        </div>

        <div class="col-12 col-lg-6 mt-4 mt-lg-0">
            <h2 class="title title--h3">Libraries and Frameworks:</h2>
            <div class="box box__second">
                <!-- Progress -->
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-text"><span>Laravel</span><span>65%</span></div>
                    </div>
                    <div class="progress-text"><span>Laravel</span></div>
                </div>

                <!-- Progress -->
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-text"><span>Codeigniter</span><span>75%</span></div>
                    </div>
                    <div class="progress-text"><span>Codeigniter</span></div>
                </div>

                <!-- Progress -->
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-text"><span>Django</span><span>60%</span></div>
                    </div>
                    <div class="progress-text"><span>Django</span></div>
                </div>

                <!-- Progress -->
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-text"><span>Jquery</span><span>70%</span></div>
                    </div>
                    <div class="progress-text"><span>Jquery</span></div>
                </div>
                <!-- Progress -->
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-text"><span>Bootstrap</span><span>70%</span></div>
                    </div>
                    <div class="progress-text"><span>Bootstrap</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
