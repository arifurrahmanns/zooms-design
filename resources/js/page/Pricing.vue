<script setup>
import TrustedBrand from '../components/common/TrustedBrand.vue';
import HaveQuestion from '../components/common/HaveQuestion.vue';
import DesignCategoryMenu from '../components/common/DesignCategoryMenu.vue';
</script>
<style>
body #solution {
    padding: 80px 0
}

body #solution h3 {
    font-size: 44px;
    line-height: 135%;
    color: #2B2F42;
    font-weight: 700
}

body #solution .crd {
    background: #FFFFFF;
    -webkit-box-shadow: 0px 10px 50px rgba(92, 208, 235, 0.25);
    box-shadow: 0px 10px 50px rgba(92, 208, 235, 0.25);
    border-radius: 12px;
    padding: 30px
}

body #solution .crd p {
    font-weight: 400;
    font-size: 16px;
    line-height: 175%;
    margin-top: 20px
}

body #solution .crd h4 {
    font-weight: 700;
    font-size: 24px;
    line-height: 144%;
    color: #2B2F42;
}

body #works {
    padding-bottom: 80px
}

body #works .tab {
    overflow: hidden
}

body #works .tab button {
    font-weight: 700;
    font-size: 19px;
    line-height: 1.3;
    padding: 30px;
    background: var(--bg);
    border-radius: 12px;
    width: 100%;
    text-align: left
}

body #works .tablinks.active {
    background: var(--bg);
    overflow: hidden;
    border-radius: 12px 12px 0 0
}

body #works .tab button.active {
    background-color: #ccc
}

body #works .tabcontent {
    display: none
}

body #works .tabcontent.active {
    display: block
}

body #works #explore .crd {
    border-top-left-radius: 0
}

body #works #design .crd {
    border-top-right-radius: 0
}

body #works .crd {
    border-radius: 12px;
    background: var(--bg)
}

body #works .crd h3 {
    font-weight: 700;
    font-size: 22px;
    line-height: 1.4;
    margin-bottom: 30px
}

body #works .crd ul li {
    font-size: 16px;
    line-height: 133%;
    margin-bottom: 15px
}

#hero {
    padding: 30px 0;
    background: linear-gradient(180deg, #E0F9FF 50%, #fff 50%);
}

#hero h1 {
    font-size: 48px;
    font-weight: 700;
    text-align: center;
    color: #2B2F42;

    /* or  */
}

#hero .crd {
    background-color: #fff;
    box-shadow: 0px 0px 20px #e7e1ff;
}

#hero .crd p,
.subttl {
    font-weight: 400;
    font-size: 17px;
    line-height: 167%;
    text-align: center;
    color: #2B2F42;
    display: block;
}

.subttl {
    font-weight: 400;
    font-size: 17px;
    line-height: 167%;
    text-align: center;
    color: #2B2F42;
    display: block;
    margin-top: 20px;
}

.crd .btn {
    width: 100%;
    max-width: 280px;
    text-align: center;
    margin: 0 auto;
    background: #5CD0EB;
    border-radius: 6px;
    display: block;
    font-weight: 700;
    font-size: 24px;
    text-align: center;
    color: #FFFFFF;
    padding: 10px 15px;
    margin-top: 35px;
    transition: .3s ease;
}

.btn.pp {
    background: #2B2F42;

}

.crd .btn:hover {
    opacity: 0.7;
}

#hero .first {
    box-shadow: -5px 0 10px #e7e1ffc6;
    border-radius: 20px 0px 0px 20px;
}

#hero .last {
    box-shadow: 5px 0 10px #e7e1ffc6;
    border-radius: 0px 20px 20px 0px;

}

#hero .crd h3 {
    color: #2B2F42;
    font-weight: 700;
    font-size: 24px;
    text-align: center;
    line-height: 125%;
    margin-bottom: 19px;
}

#hero .crd button {
    padding: 8px 25px;
    /* font-family: 'DM Sans'; */
    font-size: 20px;
    font-weight: 600;
    color: #2B2F42;

}

#hero .crd button.active,
#hero .crd button:hover {
    background: #E0F9FF;
}

.priceSelect {
    margin-top: 40px;

}

.agreementTerm {
    font-weight: 700;
    font-size: 18px;
    line-height: 22px;
    text-align: center;
    color: #2B2F42;
    margin-top: 30px;
}

.crd .price {
    color: #2B2F42;
    font-weight: 700;
    font-size: 48px;
    text-align: center;
    margin-top: 30px;
}

.selectAgree {
    background-color: #E0F9FF;
    border-radius: 6px;
    border: none;
    color: #2B2F42;
    margin: 0 auto;
    display: block;
    margin-top: 20px;
    max-width: 500px !important;
    width: 100%;
}

body #footerBtm .wrp {
    background: #E0F9FF;
    border-radius: 12px;
    padding: 40px;
}

body #footerBtm .lft h3 {
    color: #2B2F42;
    font-size: 48px;
    font-weight: 700
}

body #footerBtm .lft p {
    font-size: 16px;
    color: #fff;
    margin-top: 20px
}

body #footerBtm .lft .btn {
    font-size: 18px
}

body #footerBtm .lft .btn2 {
    background: #E0F9FF;
    color: #2B2F42
}

body #footerBtm .rght .slick-track {
    padding: 70px 0;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: stretch;
    -ms-flex-align: stretch;
    align-items: stretch;
    width: 100%
}

body #footerBtm .rght .slick-current {
    opacity: 1 !important
}

body #footerBtm .rght .slick-active:not(.slick-current) {
    opacity: 1
}

body #footerBtm .rght .slide {
    padding: 0 10px;
    height: auto
}

body #footerBtm .rght .crd {
    background: #FFFFFF;
    border-radius: 8px;
    padding: 30px;
    box-shadow: 0px 1px 13px rgb(92 208 235 / 68%);
    height: 100%
}

body #footerBtm .rght .crd .ttl {
    font-size: 22px;
    text-align: center;
    color: #2B2F42;
    font-weight: 600;
    margin-bottom: 10px
}

body #footerBtm .rght .crd ul>li {
    color: #2B2F42;
    font-size: 16px;
    margin-top: 5px;
    font-weight: 600;
    text-align: center
}

@media screen and (max-width: 825px) {


    body #works .tab button {
        font-size: 16px
    }

    body #works .crd h3 {
        font-size: 16px
    }

    body #works .crd ul li {
        font-size: 12px;
        line-height: 133%;
        margin-bottom: 9px
    }
    #hero .first {
    border-radius: 20px 20px 0px 0px;
}
#hero .last {
    border-radius: 0px 0 20px 20px;
}
}

@media screen and (max-width: 576px) {

    body #works .tab button {
        font-size: 10px;
        padding: 11px
    }
    #hero h1 {
    font-size: 32px;
    }
    body #works .crd h3 {
        font-size: 11px
    }

    body #works .crd ul li {
        gap: 4px;
        font-size: 8px
    }

    body #works .crd ul li img {
        width: 14px
    }

    body #works .tablinks {
        padding-bottom: 10px
    }

    body #solution .crd {
        padding: 16px;
    }

    body #solution .crd p {

        font-size: 13px;
    }

    body #solution .crd h4 {
        font-size: 16px;
    }

    body #footerBtm .wrp {

        padding: 13px;
    }
    body #footerBtm .lft h3 {
 
    font-size: 30px;}
    body #solution h3 {
    font-size: 30px;}
    body #solution {
    padding: 16px 0;
}
#hero .crd h3 {
   
    font-size: 21px;}
    #hero .crd p, .subttl {
    font-size: 15px;}
}
</style>

<script>
export default {
    created() {

    },
    methods: {
        openTab(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].classList.remove("active");
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(cityName).classList.add("active");
            evt.currentTarget.className += " active";
        },
        initSlider() {

            $('.heroSlider').slick({
                dots: false,
                infinite: false,
                speed: 300,

                slidesToShow: 2,
                slidesToScroll: 2,
                arrows: false,
                autoplay: false,
                // fade: true,
                autoplaySpeed: 2000,
                // variableWidth: true,
                responsive: [

                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        }
    },
    mounted() {
        this.initSlider();
        const formatNumber = (number) => {
            return new Intl.NumberFormat().format(number)
        }

        // plan 1
        const f1 = [
            {
                credit: 25,
                duration: "1 year",
                price: 750
            },
            {
                credit: 35,
                duration: "1 year",
                price: 875
            },
            {
                credit: 45,
                duration: "1 year",
                price: 900
            },
        ]
        document.querySelectorAll(".plan1 .priceSelect button").forEach(e => {
            e.addEventListener("click", function () {
                document.querySelectorAll(".plan1 .priceSelect button").forEach(e => { e.classList.remove("active") })
                this.classList.add("active")
                let val = this.getAttribute("value")
                let current = f1.find(f => { return f.credit == parseInt(val) })
                if (current) {
                    document.querySelector('.plan1 .price span').textContent = formatNumber(current.price)
                    document.querySelector(".plan1 .crdtCunt").textContent = current.credit
                    document.querySelector(".plan1 .durationCunt").textContent = current.duration
                }
            })
        })



        // plan 3
        const f3 = [
            {
                credit: 1,
                duration: "1 month",
                price: 450
            },
            {
                credit: 2,
                duration: "1 month",
                price: 850
            },
            {
                credit: 3,
                duration: "1 month",
                price: 1250
            },
            {
                credit: 4,
                duration: "1 month",
                price: 1650
            },
        ]

        document.querySelectorAll(".plan3 .priceSelect button").forEach(e => {
            e.addEventListener("click", function () {
                document.querySelectorAll(".plan3 .priceSelect button").forEach(e => { e.classList.remove("active") })
                this.classList.add("active")
                let val = this.getAttribute("value")
                let current = f3.find(f => { return f.credit == parseInt(val) })
                if (current) {
                    document.querySelector('.plan3 .price span').textContent = formatNumber(current.price)
                    document.querySelector(".plan3 .crdtCunt").textContent = current.credit
                    document.querySelector(".plan3 .durationCunt").textContent = current.duration
                }

            })
        })


        const f2 = [{
            agreement: 1,
            packs: [
                {
                    credit: 5,
                    duration: "1 month",
                    price: 250
                },
                {
                    credit: 10,
                    duration: "1 month",
                    price: 450
                },
                {
                    credit: 15,
                    duration: "1 month",
                    price: 600
                },
                {
                    credit: 25,
                    duration: "1 month",
                    price: 875
                },
                {
                    credit: 30,
                    duration: "1 month",
                    price: 900
                },

            ]
        },
        {
            agreement: 3,
            packs: [
                {
                    credit: 5,
                    duration: "3 month",
                    price: 225
                },
                {
                    credit: 10,
                    duration: "3 month",
                    price: 405
                },
                {
                    credit: 15,
                    duration: "3 month",
                    price: 540
                },
                {
                    credit: 25,
                    duration: "3 month",
                    price: 787
                },
                {
                    credit: 30,
                    duration: "3 month",
                    price: 810
                },

            ]
        },
        {
            agreement: 6,
            packs: [
                {
                    credit: 5,
                    duration: "6 month",
                    price: 200
                },
                {
                    credit: 10,
                    duration: "6 month",
                    price: 360
                },
                {
                    credit: 15,
                    duration: "6 month",
                    price: 480
                },
                {
                    credit: 25,
                    duration: "6 month",
                    price: 700
                },
                {
                    credit: 30,
                    duration: "6 month",
                    price: 720
                },

            ]
        },
        {
            agreement: 12,
            packs: [
                {
                    credit: 5,
                    duration: "12 month",
                    price: 175
                },
                {
                    credit: 10,
                    duration: "12 month",
                    price: 315
                },
                {
                    credit: 15,
                    duration: "12 month",
                    price: 420
                },
                {
                    credit: 25,
                    duration: "12 month",
                    price: 612
                },
                {
                    credit: 30,
                    duration: "12 month",
                    price: 630
                },

            ]
        }
        ]


        document.querySelectorAll(".plan2 .priceSelect button").forEach(e => {
            e.addEventListener("click", function () {
                document.querySelectorAll(".plan2 .priceSelect button").forEach(e => { e.classList.remove("active") })
                this.classList.add("active")
                let val = this.getAttribute("value")
                const slectedAgreement = $(".selectAgree").val()

                let currentAgrement = f2.find(f => { return f.agreement == parseInt(slectedAgreement) })
                let current = currentAgrement.packs.find(f => { return f.credit === parseInt(val) })
                if (current) {
                    document.querySelector('.plan2 .price span').textContent = formatNumber(current.price)
                    document.querySelector(".plan2 .crdtCunt").textContent = current.credit
                    document.querySelector(".plan2 .durationCunt").textContent = current.duration
                }

            })
        })

        $(".plan2 .selectAgree").change(function () {
            const slectedAgreement = $(this).val()
            let val = $(".plan2 .priceSelect button.active").attr("value")
            let currentAgrement = f2.find(f => { return f.agreement == parseInt(slectedAgreement) })

            let current = currentAgrement.packs.find(f => { return f.credit === parseInt(val) })
            if (current) {
                document.querySelector('.plan2 .price span').textContent = formatNumber(current.price)
                document.querySelector(".plan2 .crdtCunt").textContent = current.credit
                document.querySelector(".plan2 .durationCunt").textContent = current.duration
            }
        })
    }
}
</script>
<template>
    <div class="">
        <DesignCategoryMenu />


        <div id="hero">
            <div class="px-4 py-8 mx-auto xl:px-16">
                <div class="mx-auto max-w-[800px]">
                    <h1>
                        Get ideal graphic design pack
                        for your project
                    </h1>
                </div>
                <div class="mt-10 priceCart">
                    <div class="grid items-start lg:grid-cols-10">
                        <!-- plan1 -->
                        <div class="p-10 lg:col-span-3 first crd plan1 lg:p-14">
                            <h3>Graphic Design Yearly Pack</h3>
                            <p>Get all graphic design services request
                                within one year</p>
                            <div class="flex justify-center f1price priceSelect">
                                <button class="active" value="25">25</button>
                                <button value="35">35</button>
                                <button value="45">45</button>

                            </div>
                            <div class="price price1">$ <span>750</span></div>
                            <span class="subttl">
                                for <span class="crdtCunt">25</span> credits (within <span class="durationCunt">1
                                    year</span>)
                            </span>
                            <a href="https://t.me/zooms_group" class="btn">Get started</a>
                        </div>


                        <!-- plan 2 -->
                        <div class="relative p-10 lg:col-span-4 crd plan2 lg:p-14">
                            <h3>Graphic Design Monthly Pack</h3>
                            <p>Get all graphic design services request
                                Billed monthly </p>

                            <div class="flex justify-center priceSelect">
                                <button class="active" value="5">5</button>
                                <button value="10">10</button>
                                <button value="15">15</button>
                                <button value="30">30</button>


                            </div>
                            <div class="price">$ <span>225</span></div>
                            <span class="subttl">for <span class="crdtCunt">5</span> credits (within <span
                                    class="durationCunt">1
                                    year</span>)
                            </span>
                            <div class="agreementTerm">
                                Pick your agreement term
                            </div>
                            <select name="" id="" class="selectAgree">
                                <option selected value="1">Popular monthly Service with No Agreement</option>
                                <option value="3">Popular monthly Service 3 months Agreement ( Pay Montly ) </option>
                                <option value="6">Popular monthly Service 6 months Agreement ( Pay Montly ) </option>
                                <option value="12">Popular monthly Service 12 months Agreement ( Pay Montly ) </option>
                            </select>
                            <a href="https://t.me/zooms_group" class="btn pp">Get started</a>
                        </div>

                        <!-- plan3 -->
                        <div class="p-10 lg:col-span-3 plan3 last crd lg:p-14">
                            <h3>Remote Graphic Designer</h3>
                            <p>Monthly retainer graphic design Service
                                Unlimited credit request</p>
                            <div class="flex justify-center priceSelect">
                                <button class="active" value="1">1</button>
                                <button value="2">2</button>
                                <button value="3">3</button>
                                <button value="4">4</button>


                            </div>
                            <div class="price">$ <span>450</span></div>
                            <span class="subttl">for <span class="crdtCunt">1</span> designer (within <span
                                    class="durationCunt">1
                                    month</span>)
                                Price is estimated only
                                Contact us for pricing
                            </span>
                            <a href="https://t.me/zooms_group" class="btn">Get started</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="lg:py-8"></div>
        <HaveQuestion page="ABOUT_US" />
        <div class="py-8"></div>
        <section id="works">
            <div class="px-4 py-8 mx-auto xl:px-16">
                <h3 class="mb-5 subtitle !font-extrabold">
                    How it works
                </h3>
                <!-- Tab links -->
                <div class="flex gap-5 tab">
                    <div class="flex-grow pb-5 tablinks active lg:pb-10" style="--bg:#E0F9FF"
                        @mouseover="openTab($event, 'explore')">
                        <button class="" style="--bg:#E0F9FF;color: #5CD0EB;">Step 1. Explore</button>
                    </div>
                    <div class="flex-grow pb-5 tablinks lg:pb-10" style="--bg:#FEF6E2;color: #FAD16F;"
                        @mouseover="openTab($event, 'assign')">
                        <button class="">Step 2. Assign</button>
                    </div>
                    <div class="flex-grow pb-5 tablinks lg:pb-10" style="--bg:#FEE0E2;color: #EC6B70;"
                        @mouseover="openTab($event, 'design')">
                        <button class="">Step 3. Design </button>
                    </div>
                </div>

                <!-- Tab content -->
                <div id="explore" class="tabcontent active">
                    <div style="--bg:#E0F9FF" class="crd">

                        <div class="grid grid-cols-9">
                            <div class="col-span-7 p-3 lg:col-span-5 md:p-8">
                                <h3>We explore your monthly graphic design needs.
                                    Then we match you with the graphic designer that fit your demand.</h3>

                                <div>
                                    <ul class="grid grid-cols-2 gap-x-5">
                                        <li class="flex items-start gap-3">
                                            <img src="../assets/tik.svg" alt=""> Learn about your brands & products
                                        </li>
                                        <li class="flex items-start gap-3">
                                            <img src="../assets/tik.svg" alt=""> Your monthly demands on graphic design
                                            needs
                                        </li>
                                        <li class="flex items-start gap-3">
                                            <img src="../assets/tik.svg" alt="">Your team strength & weakness
                                        </li>
                                        <li class="flex items-start gap-3">
                                            <img src="../assets/tik.svg" alt="">Learn from your past works
                                        </li>
                                        <li class="flex items-start gap-3">
                                            <img src="../assets/tik.svg" alt=""> Your target audiences
                                        </li>
                                        <li class="flex items-start gap-3">
                                            <img src="../assets/tik.svg" alt="">Whatever you need, we’ll look for the best
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <div class="self-end col-span-2 -mb-3 lg:col-span-4 lg:self-auto lg:-mb-3 lg:-mt-3">
                                <img class="2xl:max-w-[71%] max-w-[165%] -ml-[60%] md:-ml-[35%] lg:max-w-[100%] lg:ml-0"
                                    src="../assets/explore.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tab content2 -->
                <div id="assign" class="tabcontent">
                    <div style="--bg:#FEF6E2" class="crd">

                        <div class="grid grid-cols-9">
                            <div class="col-span-7 p-3 lg:col-span-5 md:p-8">
                                <h3>We assign the dedicated designer that fits your monthly demand on graphic design tasks.
                                </h3>

                                <div>
                                    <ul class="grid grid-cols-2 gap-x-5">
                                        <li class="flex items-start gap-3">
                                            <img src="../assets/tik2.svg" alt="">Scout for the right designer
                                        </li>

                                        <li class="flex items-start gap-3">
                                            <img src="../assets/tik2.svg" alt="">Train designer with hard/soft skills
                                            needs
                                        </li>
                                        <li class="flex items-start gap-3">
                                            <img src="../assets/tik2.svg" alt="">Assessment with designer
                                        </li>

                                        <li class="flex items-start gap-3">
                                            <img src="../assets/tik2.svg" alt="">Language training for perfect communicaion
                                        </li>
                                        <li class="flex items-start gap-3">
                                            <img src="../assets/tik2.svg" alt="">Select skills that matches your needs
                                        </li>
                                        <li class="flex items-start gap-3">
                                            <img src="../assets/tik2.svg" alt="">Get the best fits for your needs
                                        </li>
                                    </ul>
                                </div>


                            </div>
                            <div class="self-end col-span-2 -mb-6 lg:col-span-4 lg:self-center">
                                <img class="2xl:max-w-[75%] mx-auto max-w-[180%] -ml-[75%] md:-ml-[20%] lg:max-w-[100%] lg:ml-auto"
                                    src="../assets/avater.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tab content3 -->
                <div id="design" class="tabcontent">
                    <div style="--bg:#FEE0E2" class="crd">

                        <div class="grid grid-cols-9">
                            <div class="col-span-7 p-3 lg:col-span-5 md:p-8">
                                <h3>Start your trial for 1-3 months, no contract and hustle free. Explore how the dedicated
                                    designer can fit with your team.
                                </h3>
                                <div>

                                    <ul class="grid grid-cols-2 gap-x-5">
                                        <li class="flex items-start gap-3">
                                            <img src="../assets/tik3.svg" alt="">Up to 3 months trial without contract
                                        </li>

                                        <li class="flex items-start gap-3">
                                            <img src="../assets/tik3.svg" alt="">Get more than one designer
                                            needs
                                        </li>
                                        <li class="flex items-start gap-3">
                                            <img src="../assets/tik3.svg" alt="">Unlimited request
                                        </li>

                                        <li class="flex items-start gap-3">
                                            <img src="../assets/tik3.svg" alt="">Not satisfied? Request for a new designer
                                        </li>

                                        <li class="flex items-start gap-3">
                                            <img src="../assets/tik3.svg" alt="">Your monthly graphic design demand
                                        </li>

                                        <li class="flex items-start gap-3">
                                            <img src="../assets/tik3.svg" alt="">Cancel supscription anytime during trial
                                        </li>
                                    </ul>


                                </div>
                            </div>
                            <div class="self-end col-span-2 -mb-4 lg:col-span-4 md:-mb-3 md:-mt-3 lg:self-auto">
                                <img class="2xl:max-w-[85%] mx-auto max-w-[167%] -ml-[60%] md:-ml-[20%] lg:max-w-[100%] lg:ml-auto"
                                    src="../assets/design.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="px-4 py-8 mx-auto xl:px-16">
            <h2 class="mb-4 font-bold md:text-xl">We design with your favourite applications</h2>
            <div class="">
                <div class="grid justify-between grid-cols-3 gap-3 overflow-auto lg:flex md:grid-cols-5 scrollbar-hide">
                    <div class="flex items-center justify-center"><img src="/images/application/canva.png"
                            class="max-w-[100px] sm:max-w-[144px]"></div>
                    <div class="flex items-center justify-center"><img src="/images/application/ps.png"
                            class="max-w-[100px] sm:max-w-[144px]"></div>
                    <div class="flex items-center justify-center"><img src="/images/application/ai.png"
                            class="max-w-[100px] sm:max-w-[144px]"></div>
                    <div class="flex items-center justify-center"><img src="/images/application/id.png"
                            class="max-w-[100px] sm:max-w-[144px]"></div>
                    <div class="flex items-center justify-center"><img src="/images/application/ae.png"
                            class="max-w-[100px] sm:max-w-[144px]"></div>
                    <div class="flex items-center justify-center"><img src="/images/application/pwp.png"
                            class="max-w-[100px] sm:max-w-[144px]"></div>
                    <div class="flex items-center justify-center"><img src="/images/application/page.png"
                            class="max-w-[100px] sm:max-w-[144px]"></div>
                    <div class="flex items-center justify-center"><img src="/images/application/figma.png"
                            class="max-w-[100px] sm:max-w-[144px]"></div>
                </div>
            </div>
        </div>
        <div class="py-8"></div>
        <section id="solution">
            <div class="px-4 py-8 mx-auto xl:px-16">
                <h3 class="max-w-xl">Your solution for high demand graphic design </h3>
                <div class="grid gap-10 lg:gap-16 lg:grid-cols-9">

                    <div class="lg:col-span-4">

                        <img class="hidden mt-10 lg:block" src="../assets/desk.png" alt="">
                    </div>
                    <div class="lg:mt-16 lg:col-span-5">
                        <div class="grid grid-cols-2 gap-3 md:gap-10">
                            <div class="crd">
                                <h4>All designer are guranteed</h4>
                                <p>
                                    Guranteed to get the right designer that fits your demand. Unhappy with designer? You
                                    can request for a new one
                                </p>
                            </div>
                            <div class="crd">
                                <h4>Vetted <br>
                                    graphic designer</h4>
                                <p>
                                    All designers are trained with language, soft skills, hard skills to make communicating
                                    seemless.
                                </p>
                            </div>
                            <div class="mt-2 crd md:mt-5">
                                <h4>Like hiring <br>
                                    in-house </h4>
                                <p>
                                    Designers are available during working hours just like an in-house. 8 hours/Day, 5
                                    Days/Week
                                </p>
                            </div>
                            <div class="mt-2 crd md:mt-5">
                                <h4>Flexible <br>
                                    term</h4>
                                <p>
                                    Flexible contract term, hire graphic designers for 6 months or 12 months, no extra fee
                                    charge
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>


        <section id="footerBtm">
            <div class="px-4 py-8 mx-auto xl:px-16">
                <div class="wrp">
                    <div class="items-center gap-16 lg:grid lg:grid-cols-10">
                        <div class="lft lg:col-span-4">
                            <h3>Tired of having the wrong
                                designer for the job?</h3>

                            <div class="flex max-w-sm gap-2 mx-auto mt-5 lg:max-w-none md:gap-5">

                                <a href="https://t.me/zooms_group"
                                    class="bg-[#5FC3DF] hover:opacity-90 text-white font-bold rounded px-4 xl:px-8 py-3 text-sm lg:text-base">Get
                                    started</a>

                            </div>
                        </div>
                        <div class="mr-0 rght lg:col-span-6">
                            <div class="wraperr">


                                <div class="heroSlider">


                                    <div class="slide">

                                        <div class="crd">
                                            <p class="ttl">Multimedia Designer</p>
                                            <ul>
                                                <li>
                                                    Video Editing
                                                </li>
                                                <li>
                                                    Motion Graphic
                                                </li>
                                                <li>
                                                    GIF & Effect
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="slide">

                                        <div class="crd">
                                            <p class="ttl">Logo & Branding Designer</p>
                                            <ul>
                                                <li>
                                                    Logo Design
                                                </li>
                                                <li>
                                                    Brand Identity
                                                </li>
                                                <li>
                                                    Brand Visual
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="slide">

                                        <div class="crd">
                                            <p class="ttl">Social Media Designer</p>
                                            <ul>
                                                <li>
                                                    Social Media Design
                                                </li>
                                                <li>
                                                    Content & Creative
                                                </li>
                                                <li>
                                                    GIF and Motion Graphic
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="slide">

                                        <div class="crd">
                                            <p class="ttl"> Ads & Marketing Designer</p>
                                            <ul>
                                                <li>
                                                    Social Media Design
                                                </li>
                                                <li>
                                                    Content & Creative
                                                </li>
                                                <li>
                                                    GIF and Motion Graphic
                                                </li>
                                            </ul>
                                        </div>
                                    </div>


                                    <div class="slide">

                                        <div class="crd">
                                            <p class="ttl"> Web & App Designer</p>
                                            <ul>
                                                <li>
                                                    UX / UI
                                                </li>
                                                <li>
                                                    Button & Icon
                                                </li>
                                                <li>
                                                    Landing page design
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="slide">

                                        <div class="crd">

                                            <p class="ttl"> Publication Designer</p>
                                            <ul>
                                                <li>
                                                    Book & Cover
                                                </li>
                                                <li>
                                                    Catalog
                                                </li>
                                                <li>
                                                    Calendar
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="slide">

                                        <div class="crd">
                                            <p class="ttl"> Packaging Designer</p>
                                            <ul>
                                                <li>
                                                    Product Label
                                                </li>
                                                <li>
                                                    Packaging & Label
                                                </li>
                                                <li>
                                                    Box & Product
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="slide">

                                        <div class="crd">
                                            <p class="ttl"> Illustration Designer</p>
                                            <ul>
                                                <li>
                                                    Illustration
                                                </li>
                                                <li>
                                                    Visual Art
                                                </li>
                                                <li>
                                                    2D & 3D Character
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <TrustedBrand />



</div></template>  