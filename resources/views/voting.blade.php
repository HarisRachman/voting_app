@extends('layout')

@section('content')
<!-- Banner Starts Here -->
<div class="heading-page header-text">
    <section class="page-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-content">
              <h4>Road To Star 2024</h4>
              <h2>Vote Finalis Favoritmu Dibawah!</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- Banner Ends Here -->


<section class="about-us">
    <div class="container">
        
      <div class="row mb-4">
        <div class="col-lg-12">
          <img src="{{ asset('resource/assets/images/roadtostar.jpg') }}" alt="" style="border-radius: 10px; border: 1px solid">
        </div>
      </div>

      <br>
      <div class="card">

      

      <style>
        .containers {
            display: flex;
            justify-content: space-around;
            /* flex-wrap: wrap; */
            max-width: 1350px;
        }

        .card2 {
            background: white;
            /* border: 1px solid linear-gradient(135deg, #ff5e62, #ff9966); */
            border: 1px solid #ff9966;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            margin: 15px;
            width: 350px;
            /* color: white; */
            transition: transform 0.3s;
        }

        .card2:hover {
            transform: translateY(-5px);
        }

        .card2-header {
            margin: 15px 20px;
        }

        .card2-image {
            max-width: 50px; /* Ukuran logo */
            height: auto;
            border-radius: 5px;
            margin-right: 10px; /* Spasi antara logo dan teks */
        }

        .card2-body {
            padding: 0 20px 20px; /* Padding untuk body */
        }

        .header-content2 {
            display: flex;
            align-items: center; /* Memastikan logo dan teks sejajar secara vertikal */
        }

        .text-content2 {
            display: flex;
            flex-direction: column; /* Menyusun teks secara vertikal */
        }

        .card2 h3 {
            margin: 0;
            font-size: 1.5em;
        }

        .card2 p {
            margin: 5px 0;
            font-size: 1.1em;
            /* color: white; */
            text-align: left;
        }

        .card2 i {
            margin-right: 10px;
        }
      </style>
      
        <div class="containers">
            <div class="card2">
                <div class="card2-header">
                    <h3>Penyelenggara Acara</h3>
                </div>
                <hr style="background-color: white">
                <div class="card2-body">
                    <div class="header-content2">
                        <img src="https://static.vecteezy.com/system/resources/previews/019/528/449/original/rnv-abstract-technology-logo-design-on-white-background-rnv-creative-initials-letter-logo-concept-vector.jpg" alt="Logo Penyelenggara" class="card2-image">
                        <div class="text-content2">
                            <p><i class="fas fa-user-friends"></i> Real Visindotama</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card2">
                <div class="card2-header">
                    <h3>Tanggal dan Waktu Acara</h3>
                </div>
                <hr style="background-color: white">
                <div class="card2-body">
                    <p><i class="fas fa-calendar-alt"></i> Sabtu, 28 September 2024</p>
                    <p><i class="fas fa-clock"></i> 19:00 WIB - 23:30 WIB</p>
                </div>
            </div>

            <div class="card2">
                <div class="card2-header">
                    <h3>Venue dan Lokasi Acara</h3>
                </div>
                <hr style="background-color: white">
                <div class="card2-body">
                    <p><i class="fas fa-map-marker-alt"></i> <a href="https://maps.app.goo.gl/uPePNLCqKFRVnGfD9" target="_blank" style="color: gray"> Horison Ultima Bandung</a></p>
                    <p><i class="fas fa-address-card"></i> Jl. Pelajar Pejuang 45 No.121, Turangga, Kec. Lengkong, Kota Bandung</p>
                </div>
            </div>
        </div>

        <br>

        <style>
            .card3 {
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                padding: 20px;
                width: 96%;
                margin: 0px 20px;
                text-align: center;
                border: 1px solid #ddd;
            }

            .title {
                font-size: 28px;
                font-weight: bold;
                color: #333;
                margin-bottom: 15px;
                line-height: 1.4;
            }

            .tag {
                background-color: #e7f8ed;
                color: #38a169;
                display: inline-block;
                padding: 8px 15px;
                border-radius: 20px;
                font-size: 12px;
                font-weight: bold;
                margin-bottom: 15px;
            }

            .vote-buttons {
                display: flex;
                justify-content: center;
                margin-bottom: 20px;
            }

            .vote-buttons button {
                background-color: #f5f5f5;
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 10px 15px;
                margin: 0px 15px;
                font-size: 14px;
                color: #333;
                transition: background-color 0.3s ease;
                width: 12%;
            }

            .vote-buttons button:hover {
                background-color: #ddd;
            }

            .faq-vote {
                background-color: #f8d7da; /* Soft Red Background */
                color: #d9534f; /* Red Text Color */
                border-color: #f5c6cb;
            }

            .faq-vote:hover {
                background-color: #f1b0b7;
            }

            .tutorial-vote {
                background-color: #d1ecf1; /* Light Blue Background */
                color: #5bc0de; /* Blue Text Color */
                border-color: #bee5eb;
            }

            .tutorial-vote:hover {
                background-color: #bce1e7;
            }

            .terms-vote {
                background-color: #fff3cd; /* Light Yellow Background */
                color: #f0ad4e; /* Yellow-Orange Text Color */
                border-color: #ffeeba;
            }

            .terms-vote:hover {
                background-color: #ffe8a1;
            }

            .description {
                font-size: 16px;
                color: #666;
                margin-bottom: 20px;
                line-height: 1.5;
            }

            .leaderboard-span {
                background-color: #ff7043;
                color: #fff;
                border-radius: 5px;
                padding: 12px 18px;
                font-size: 20px;
                font-weight: bold;
                display: inline-block;
                margin-bottom: 50px;
            }

            .finalis-span {
                background-color: #ff7043;
                color: #fff;
                border-radius: 5px;
                padding: 12px 18px;
                font-size: 20px;
                font-weight: bold;
                display: inline-block;
            }

        </style>

        <div class="card3">
            <h3 class="title">Road To Star 2024</h3>
    
            <div class="tag">
                <span>NATIONAL VOTE</span>
            </div>
    
            <div class="vote-buttons">
                <button class="faq-vote">FAQ Vote</button>
                <button class="tutorial-vote">Tutorial Vote</button>
                <button class="terms-vote">S&K Voting</button>
            </div>
    
            <div class="description">
                <h5>Deskripsi</h5>
                <p>Lorem ipsum odor amet, consectetuer adipiscing elit. Nec finibus nulla finibus mattis pellentesque. Lacinia duis nam ultrices proin aenean erat netus eleifend iaculis. Velit praesent tellus penatibus, netus eu tempus. Egestas vivamus adipiscing ornare duis porttitor efficitur leo cursus. Massa adipiscing convallis consectetur justo scelerisque facilisi montes amet congue. Fusce donec eros nisl ad mattis pellentesque tincidunt leo.

                    Scelerisque laoreet curabitur finibus urna dolor donec consectetur blandit. Habitant aliquam taciti nostra nascetur orci scelerisque dictum facilisi. Aliquet diam nec litora, interdum urna consequat. Suspendisse vivamus egestas, pulvinar mi elit tristique mollis. Purus suspendisse feugiat bibendum id; nulla fermentum. Tellus per mattis lectus, aenean placerat vel nullam. Congue justo fermentum taciti habitant efficitur. Vivamus cubilia torquent sit proin et himenaeos egestas parturient sed.</p>
            </div>
        </div>

      </br>

      <div class="row mb-4">
        <div class="col-md-12">
            <div class="leaderboard-span">
                <span>Leaderboards Road To Star 2024</span>
            </div>

            <style>
                /* Podium layout */
                .podium {
                    display: flex;
                    justify-content: center;
                    gap: 45px;
                    align-items: flex-end;
                    margin-bottom: 30px
                }

                /* Styling for first, second, and third position */
                .position {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    transition: transform 0.3s ease;
                }

                .first .cards {
                    background-color: #fff;
                    padding: 20px;
                    width: 290px;
                    border-radius: 15px;
                    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
                    border: 4px solid #ffd700; /* Gold border for first place */
                    transform: translateY(-20px);
                }

                .second .cards {
                    background-color: #fff;
                    padding: 20px;
                    width: 260px;
                    border-radius: 15px;
                    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
                    border: 4px solid #c0c0c0; /* Silver border for second place */
                }

                .third .cards {
                    background-color: #fff;
                    padding: 20px;
                    width: 260px;
                    border-radius: 15px;
                    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
                    border: 4px solid #cd7f32; /* Bronze border for third place */
                }

                /* Hover effect */
                .position:hover {
                    transform: translateY(-10px);
                }

                /* Styling for images and crowns */
                .cards img.participant-image {
                    width: 100%;
                    border-radius: 10px;
                    margin-bottom: 15px;
                }

                .crown-gold {
                    width: 70px;
                    margin-bottom: 15px;
                }

                .crown {
                    width: 40px;
                    margin-bottom: 15px;
                }

                /* Name and votes styling */
                .cards h2 {
                    margin: 10px 0 5px;
                    font-size: 1.4rem;
                    color: #333;
                }

                .cards p {
                    font-size: 1.2rem;
                    color: #e53935;
                    font-weight: bold;
                }

                /* Subtle animations */
                .cards {
                    transition: all 0.3s ease;
                }

                .cards:hover {
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
                    transform: translateY(-10px);
                }

                /* Add media queries for responsiveness */
                @media (max-width: 768px) {
                    .podium {
                        flex-direction: column;
                        align-items: center;
                    }

                    .cards {
                        width: 200px;
                    }
                }
            </style>

            <div class="podium">
                <div class="position second">
                    {{-- @foreach ($lead2 as $lead) --}}
                        <div class="cards">
                            <img src="https://www.kreen.id/public/image/silver_crown.png" alt="Second Place" class="crown">
                            <img src="{{ asset('images/image2.jpeg') }}" alt="Peserta 2" class="participant-image">
                            <span class="badge" style="background-color: #c0c0c0; padding: 10px 18px; border-radius: 50%; margin-bottom: 25px"><h4>2</h4></span>
                            <h2>Peserta 2</h2>
                            <h6>Daerah 2</h6> <br>
                            <p>5 Votes</p>
                        </div>
                    {{-- @endforeach --}}
                </div>
                <div class="position first">
                    {{-- @foreach ($lead1 as $lead) --}}
                        <div class="cards">
                            <img src="https://www.kreen.id/public/image/gold_crown.gif" alt="First Place" class="crown-gold">
                            <img src="{{ asset('images/image1.jpeg') }}" alt="Peserta 1" class="participant-image">
                            <span class="badge" style="background-color: #ffd700; padding: 10px 18px; border-radius: 50%; margin-bottom: 25px"><h4>1</h4></span>
                            <h2>Peserta 1</h2>
                            <h6>Daerah 1</h6> <br>
                            <p>5 Votes</p>
                        </div>
                    {{-- @endforeach --}}
                </div>
                <div class="position third">
                    {{-- @foreach ($lead3 as $lead) --}}
                        <div class="cards">
                            <img src="https://www.kreen.id/public/image/bronze_crown.png" alt="Third Place" class="crown">
                            <img src="{{ asset('images/image3.jpeg') }}" alt="Peserta 3" class="participant-image">
                            <span class="badge" style="background-color: #cd7f32; padding: 10px 18px; border-radius: 50%; margin-bottom: 25px"><h4>3</h4></span>
                            <h2>Peserta 3</h2>
                            <h6>Daerah 3</h6> <br>
                            <p>5 Votes</p>
                        </div>
                    {{-- @endforeach --}}
                </div>
            </div>
            
            @php $no = 4; @endphp
            {{-- @foreach ($leaderboards as $lead) --}}
                <div class="card text-center">
                    <div class="card-body participant">
                        <span class="badge badge-light" style="margin-right: 20px; padding: 10px 18px; border-radius: 50%;"><h4>{{ $no++ }}</h4></span>
                        <img src="{{ asset('images/image1.jpeg') }}" alt="Peserta 4">
                        <div class="info">
                            <h4 class="card-title">Peserta 4</h4>
                            <p class="card-text">Daerah 4</p>
                        </div>
                        <span class="votes" style="color: #e53935;">5 <br> Votes</span>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-body participant">
                        <span class="badge badge-light" style="margin-right: 20px; padding: 10px 18px; border-radius: 50%;"><h4>{{ $no++ }}</h4></span>
                        <img src="{{ asset('images/image2.jpeg') }}" alt="Peserta 5">
                        <div class="info">
                            <h4 class="card-title">Peserta 5</h4>
                            <p class="card-text">Daerah 5</p>
                        </div>
                        <span class="votes" style="color: #e53935;">5 <br> Votes</span>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-body participant">
                        <span class="badge badge-light" style="margin-right: 20px; padding: 10px 18px; border-radius: 50%;"><h4>{{ $no++ }}</h4></span>
                        <img src="{{ asset('images/image3.jpeg') }}" alt="Peserta 6">
                        <div class="info">
                            <h4 class="card-title">Peserta 6</h4>
                            <p class="card-text">Daerah 6</p>
                        </div>
                        <span class="votes" style="color: #e53935;">5 <br> Votes</span>
                    </div>
                </div>
            {{-- @endforeach --}}
        </div>
      </div>

      </br>

      <div class="row">
        <div class="col-md-12">
            <div class="finalis-span">
                <span>Vote Finalis Favoritmu</span>
            </div>
          {{-- <div class="card"> --}}
            <div class="row" style="padding: 10px;">
              <!-- Card Candidate 1 -->
                {{-- @foreach ($candidates as $cand) --}}
                    <div class="col-lg-3 col-md-6">
                        <div class="card mb-4" style="padding: 10px;">
                            <img src="{{ asset('images/image1.jpeg') }}" class="card-img-top" alt="Nama Kandidat">
                            <div class="card-body">
                                <h5 class="card-title">Peserta 1</h5>
                                <p class="card-text">Daerah 1</p>
                                <p class="card-text">Jumlah Vote: 5</p>
                                <button class="detail-btn btn btn-light" data-candidate="Peserta 1" data-daerah="Daerah 1">Detail</button> <br><br>
                                <button class="vote-btn btn btn-primary" data-id="1" data-candidate="Peserta 1" data-image="images/image1.jpeg" data-price="2500">Vote</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card mb-4" style="padding: 10px;">
                            <img src="{{ asset('images/image2.jpeg') }}" class="card-img-top" alt="Nama Kandidat">
                            <div class="card-body">
                                <h5 class="card-title">Peserta 2</h5>
                                <p class="card-text">Daerah 2</p>
                                <p class="card-text">Jumlah Vote: 5</p>
                                <button class="detail-btn btn btn-light" data-candidate="Peserta 2" data-daerah="Daerah 2">Detail</button> <br><br>
                                <button class="vote-btn btn btn-primary" data-id="2" data-candidate="Peserta 2" data-image="images/image3.jpeg" data-price="2500">Vote</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card mb-4" style="padding: 10px;">
                            <img src="{{ asset('images/image3.jpeg') }}" class="card-img-top" alt="Nama Kandidat">
                            <div class="card-body">
                                <h5 class="card-title">Peserta 3</h5>
                                <p class="card-text">Daerah 3</p>
                                <p class="card-text">Jumlah Vote: 5</p>
                                <button class="detail-btn btn btn-light" data-candidate="Peserta 3" data-daerah="Daerah 3">Detail</button> <br><br>
                                <button class="vote-btn btn btn-primary" data-id="3" data-candidate="Peserta 3" data-image="images/image3.jpeg" data-price="2500">Vote</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card mb-4" style="padding: 10px;">
                            <img src="{{ asset('images/image1.jpeg') }}" class="card-img-top" alt="Nama Kandidat">
                            <div class="card-body">
                                <h5 class="card-title">Peserta 4</h5>
                                <p class="card-text">Daerah 4</p>
                                <p class="card-text">Jumlah Vote: 5</p>
                                <button class="detail-btn btn btn-light" data-candidate="Peserta 4" data-daerah="Daerah 4">Detail</button> <br><br>
                                <button class="vote-btn btn btn-primary" data-id="4" data-candidate="Peserta 4" data-image="images/image1.jpeg" data-price="2500">Vote</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card mb-4" style="padding: 10px;">
                            <img src="{{ asset('images/image2.jpeg') }}" class="card-img-top" alt="Nama Kandidat">
                            <div class="card-body">
                                <h5 class="card-title">Peserta 5</h5>
                                <p class="card-text">Daerah 5</p>
                                <p class="card-text">Jumlah Vote: 5</p>
                                <button class="detail-btn btn btn-light" data-candidate="Peserta 5" data-daerah="Daerah 5">Detail</button> <br><br>
                                <button class="vote-btn btn btn-primary" data-id="5" data-candidate="Peserta 5" data-image="images/image3.jpeg" data-price="2500">Vote</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card mb-4" style="padding: 10px;">
                            <img src="{{ asset('images/image3.jpeg') }}" class="card-img-top" alt="Nama Kandidat">
                            <div class="card-body">
                                <h5 class="card-title">Peserta 6</h5>
                                <p class="card-text">Daerah 6</p>
                                <p class="card-text">Jumlah Vote: 6</p>
                                <button class="detail-btn btn btn-light" data-candidate="Peserta 6" data-daerah="Daerah 6">Detail</button> <br><br>
                                <button class="vote-btn btn btn-primary" data-id="6" data-candidate="Peserta 6" data-image="images/image3.jpeg" data-price="2500">Vote</button>
                            </div>
                        </div>
                    </div>
                {{-- @endforeach --}}
            </div>
          {{-- </div>     --}}
        </div>
      </div>
    </div>
    </div>
</section>

<style>
.modals {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
}

.modals-content {
    background-color: #fff;
    margin: 5% auto;
    padding: 20px;
    border-radius: 5px;
    width: 80%;
    max-width: 800px;
    position: relative;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

.closeDetail {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.closeDetail:hover,
.closeDetail:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

.modals-body {
    display: flex;
    justify-content: space-between;
}

.modals-left,
.modals-right {
    width: 48%;
}

.modals-img {
    width: 100%;
    border-radius: 8px;
    height: auto;
}

.modals-right {
    padding-left: 20px;
}

.modals-right label {
    display: block;
    margin: 10px 0 5px;
}

.modals-right input {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

button#submitVote {
    background-color: #28a745;
    border: none;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

button#submitVote:hover {
    background-color: #218838;
}
</style>

<!-- Modal -->
<div id="voteModal" class="modals">
    <div class="modals-content">
        <span class="close">&times;</span>
        <div class="modals-body">
            <div class="modals-left">
                <img id="modalImage" src="" alt="Kandidat Image" class="modals-img">
            </div>
            <div class="modals-right">
                <h2 id="candidateName">Nama Kandidat</h2>
                <p id="pricePerVote">Harga per Vote: <span id="priceValue">0</span> </p>
                
                <hr>

                <form method="POST" action="{{ route('vote.store') }}">
                    @csrf
                    <h3>Informasi Voter:</h3>
                    <input type="hidden" id="idCandidate" name="id_candidate">
                    <input type="hidden" id="amount" name="amount">

                    <label for="voterName">Nama Voter:</label>
                    <input type="text" id="voterName" name="nama_voter" placeholder="Nama Voter">
                    
                    <label for="voterPhone">Telepon Voter:</label>
                    <input type="tel" id="voterPhone" name="telp_voter" placeholder="Telepon Voter">
                    
                    <hr>

                    <label for="voteCount">Jumlah Vote:</label>
                    <input type="number" id="voteCount" name="jml_vote" min="1" value="1">
                    
                    <h4>Total Harga: <span id="totalPrice">0</span></h4> <br>
                    
                    <button type="submit" id="submitVote">Submit Vote</button>
                </form>

            </div>
        </div>
    </div>
</div>

<div id="detailModal" class="modals">
    <div class="modals-content">
        <span class="closeDetail">&times;</span><br>
        <center><h4>Detail Kandidat</h4></center>
        <hr>
        <div class="modals-body">
            <div class="modals-left">
                <h4>Video Perkenalan</h4>
                <iframe width="100%" height="280" src="https://www.youtube.com/embed/dqH6jafFFHk" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="modals-right">
                <p>Nama Peserta</p>
                <h5 class="mb-4" id="nama_kandidat">Qaisra Aquila Indrianti</h5>
                <p>Tempat, Tanggal Lahir</p>
                <h5 class="mb-4" id="ttl">Tasikmalaya, 22 Februari 2002</h5>
                <p>Usia</p>
                <h5 class="mb-4" id="usia_kandidat">22 Tahun</h5>
                <p>Asal Daerah</p>
                <h5 class="mb-4" id="asal_daerah">Tasikmalaya</h5>
                <p>Hobi</p>
                <h5 class="mb-4" id="hobi_kandidat">Membaca, Modeling, Travelling</h5>
                <p>Bakat</p>
                <h5 class="mb-4" id="bakat_kandidat">Menyanyi, Menggambar</h5>
            </div>
        </div>
    </div>
</div>

@endsection