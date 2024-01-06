<template>
  <div>
    <main>
        <!-- Whats New Start -->
        <section class="whats-news-area pt-50 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-3 col-md-3">
                                <div class="section-tittle mb-30">
                                    <h3></h3>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="properties__button">
                                    <!--Nav Button  -->
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="details.htmlnav-home" role="tab" aria-controls="nav-home" aria-selected="true">All</a
                        >
                        <a
                          class="nav-item nav-link"
                          id="nav-profile-tab"
                          data-toggle="tab"
                          href="details.htmlnav-profile"
                          role="tab"
                          aria-controls="nav-profile"
                          aria-selected="false"
                          @click="searchCategoryData(singlecategory.id)"
                         v-for="(singlecategory,index) in category" :key="index" >{{ singlecategory.name }}</a
                        >
                      </div>
    <button class="btn btn-success float-end  btn-sm" @click="login()" v-if="!tokenStatus">LOGIN</button>
    <button class="btn btn-success float-end  btn-sm" v-if="tokenStatus" @click="logout()">Logout</button>

                    </nav>
                    <!--End Nav Button  -->
                  </div>
                </div>
              </div>
                       <!-- search bar -->
                       <div class="d-flex justify-content-end my-4">
                      <input type="text" class="form-control w-25" id="" v-model="searchVal">
                      <button @click="searchPost()" style="width:130px;background-color: black;">search</button>
                       </div>
                        <!-- search bar -->
              <div class="row">
                <div class="col-12">
                  <!-- Nav Card -->
                  <div class="tab-content" id="nav-tabContent">
                    <!-- card one -->
                    <div
                      class="tab-pane fade show active"
                      id="nav-home"
                      role="tabpanel"
                      aria-labelledby="nav-home-tab"
                    >
                      <div class="whats-news-caption">
                        <div class="row" v-if="post.length != 0">
                          <div  v-for="(singlepost,index) in post" :key="index" class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100" @click="toPostDetail(singlepost.id)">
                              <div class="what-img">
                                <img
                                  :src="singlepost.image"
                                  alt=""
                                />
                              </div>
                              <div class="what-cap">
                                <span class="color1">{{ singlepost.title }}</span>
                                <h4>
                                  <a href="details.html"
                                    >{{ singlepost.description }}</a
                                  >
                                </h4>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <h1 class="d-flex justify-content-center text-danger" v-if="post.length == 0 ">There is no data</h1>
                          <h1 class="d-flex justify-content-center text-danger" v-if="!tokenStatus">You dont have token</h1>
                        </div>
               

                      </div>
                    </div>
                    <!-- Card two -->
                    <div
                      class="tab-pane fade"
                      id="nav-profile"
                      role="tabpanel"
                      aria-labelledby="nav-profile-tab"
                    >
                      <div class="whats-news-caption">
                        <div class="row">
                          <div class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100">
                              <div class="what-img">
                                <img
                                  src="assets/img/news/whatNews1.jpg"
                                  alt=""
                                />
                              </div>
                              <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4>
                                  <a href="details.html"
                                    >Welcome To The Best Model Winner Contest</a
                                  >
                                </h4>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100">
                              <div class="what-img">
                                <img
                                  src="assets/img/news/whatNews2.jpg"
                                  alt=""
                                />
                              </div>
                              <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4>
                                  <a href="details.html"
                                    >Welcome To The Best Model Winner Contest</a
                                  >
                                </h4>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100">
                              <div class="what-img">
                                <img
                                  src="assets/img/news/whatNews3.jpg"
                                  alt=""
                                />
                              </div>
                              <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4>
                                  <a href="details.html"
                                    >Welcome To The Best Model Winner Contest</a
                                  >
                                </h4>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100">
                              <div class="what-img">
                                <img
                                  src="assets/img/news/whatNews4.jpg"
                                  alt=""
                                />
                              </div>
                              <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4>
                                  <a href="details.html"
                                    >Welcome To The Best Model Winner Contest</a
                                  >
                                </h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Card three -->
                    <div
                      class="tab-pane fade"
                      id="nav-contact"
                      role="tabpanel"
                      aria-labelledby="nav-contact-tab"
                    >
                      <div class="whats-news-caption">
                        <div class="row">
                          <div class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100">
                              <div class="what-img">
                                <img
                                  src="assets/img/news/whatNews1.jpg"
                                  alt=""
                                />
                              </div>
                              <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4>
                                  <a href="details.html"
                                    >Welcome To The Best Model Winner Contest</a
                                  >
                                </h4>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100">
                              <div class="what-img">
                                <img
                                  src="assets/img/news/whatNews2.jpg"
                                  alt=""
                                />
                              </div>
                              <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4>
                                  <a href="details.html"
                                    >Welcome To The Best Model Winner Contest</a
                                  >
                                </h4>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100">
                              <div class="what-img">
                                <img
                                  src="assets/img/news/whatNews3.jpg"
                                  alt=""
                                />
                              </div>
                              <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4>
                                  <a href="details.html"
                                    >Welcome To The Best Model Winner Contest</a
                                  >
                                </h4>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100">
                              <div class="what-img">
                                <img
                                  src="assets/img/news/whatNews4.jpg"
                                  alt=""
                                />
                              </div>
                              <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4>
                                  <a href="details.html"
                                    >Welcome To The Best Model Winner Contest</a
                                  >
                                </h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- card fure -->
                    <div
                      class="tab-pane fade"
                      id="nav-last"
                      role="tabpanel"
                      aria-labelledby="nav-last-tab"
                    >
                      <div class="whats-news-caption">
                        <div class="row">
                          <div class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100">
                              <div class="what-img">
                                <img
                                  src="assets/img/news/whatNews1.jpg"
                                  alt=""
                                />
                              </div>
                              <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4>
                                  <a href="details.html"
                                    >Welcome To The Best Model Winner Contest</a
                                  >
                                </h4>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100">
                              <div class="what-img">
                                <img
                                  src="assets/img/news/whatNews2.jpg"
                                  alt=""
                                />
                              </div>
                              <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4>
                                  <a href="details.html"
                                    >Welcome To The Best Model Winner Contest</a
                                  >
                                </h4>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100">
                              <div class="what-img">
                                <img
                                  src="assets/img/news/whatNews3.jpg"
                                  alt=""
                                />
                              </div>
                              <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4>
                                  <a href="details.html"
                                    >Welcome To The Best Model Winner Contest</a
                                  >
                                </h4>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100">
                              <div class="what-img">
                                <img
                                  src="assets/img/news/whatNews4.jpg"
                                  alt=""
                                />
                              </div>
                              <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4>
                                  <a href="details.html"
                                    >Welcome To The Best Model Winner Contest</a
                                  >
                                </h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- card Five -->
                    <div
                      class="tab-pane fade"
                      id="nav-nav-Sport"
                      role="tabpanel"
                      aria-labelledby="nav-Sports"
                    >
                      <div class="whats-news-caption">
                        <div class="row">
                          <div class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100">
                              <div class="what-img">
                                <img
                                  src="assets/img/news/whatNews1.jpg"
                                  alt=""
                                />
                              </div>
                              <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4>
                                  <a href="details.html"
                                    >Welcome To The Best Model Winner Contest</a
                                  >
                                </h4>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100">
                              <div class="what-img">
                                <img
                                  src="assets/img/news/whatNews2.jpg"
                                  alt=""
                                />
                              </div>
                              <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4>
                                  <a href="details.html"
                                    >Welcome To The Best Model Winner Contest</a
                                  >
                                </h4>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100">
                              <div class="what-img">
                                <img
                                  src="assets/img/news/whatNews3.jpg"
                                  alt=""
                                />
                              </div>
                              <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4>
                                  <a href="details.html"
                                    >Welcome To The Best Model Winner Contest</a
                                  >
                                </h4>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100">
                              <div class="what-img">
                                <img
                                  src="assets/img/news/whatNews4.jpg"
                                  alt=""
                                />
                              </div>
                              <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4>
                                  <a href="details.html"
                                    >Welcome To The Best Model Winner Contest</a
                                  >
                                </h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- card Six -->
                    <div
                      class="tab-pane fade"
                      id="nav-techno"
                      role="tabpanel"
                      aria-labelledby="nav-technology"
                    >
                      <div class="whats-news-caption">
                        <div class="row">
                          <div class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100">
                              <div class="what-img">
                                <img
                                  src="assets/img/news/whatNews1.jpg"
                                  alt=""
                                />
                              </div>
                              <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4>
                                  <a href="details.html"
                                    >Welcome To The Best Model Winner Contest</a
                                  >
                                </h4>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100">
                              <div class="what-img">
                                <img
                                  src="assets/img/news/whatNews2.jpg"
                                  alt=""
                                />
                              </div>
                              <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4>
                                  <a href="details.html"
                                    >Welcome To The Best Model Winner Contest</a
                                  >
                                </h4>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100">
                              <div class="what-img">
                                <img
                                  src="assets/img/news/whatNews3.jpg"
                                  alt=""
                                />
                              </div>
                              <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4>
                                  <a href="details.html"
                                    >Welcome To The Best Model Winner Contest</a
                                  >
                                </h4>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100">
                              <div class="what-img">
                                <img
                                  src="assets/img/news/whatNews4.jpg"
                                  alt=""
                                />
                              </div>
                              <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4>
                                  <a href="details.html"
                                    >Welcome To The Best Model Winner Contest</a
                                  >
                                </h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Nav Card -->
                </div>
              </div>
            </div>
           </div>
           </div>
        </section>
        <!-- Whats New End -->

        <!--Start pagination -->
        <div class="pagination-area pb-45 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item">
                                        <a class="page-link" href="details.html"><span class="flaticon-arrow roted"></span
                      ></a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="details.html">01</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="details.html">02</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="details.html">03</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="details.html"><span class="flaticon-arrow right-arrow"></span
                      ></a>
                                            </li>
                                            </ul>
                                    </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End pagination  -->
</main>
  </div>
</template>

<script src="../js/home.js"></script>



