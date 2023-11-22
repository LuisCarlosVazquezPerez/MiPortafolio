<div>

    <div>
        <h2 data-aos="fade-right" class="text-center text-4xl sm:text-5xl md:text-4xl lg:text-5xl   xl:text-8xl font-bold md:font-normal">Hola
            Soy</h2>
        <h2 data-aos="fade-up" class="text-center text-7xl sm:text-8xl md:text-5xl lg:text-8xl   xl:text-9xl    font-bold text-blue-500">
            Luis Carlos</h2>
    </div>

    <div class="h-10">
        <div id="messenger" data-aos="fade-up" 
            class="text-2xl sm:text-3xl md:text-2xl lg:text-3xl xl:text-4xl  text-blue-600 text-center font-bold"></div>
    </div>

    <div class="flex justify-center mt-4 md:justify-center lg:justify-end md:mt-0">
        <div class="w-full md:w-auto ">
        <a href="cv/cvprueba.pdf" download="cvprueba.pdf">
            <button class="cssbuttons-io w-full md:w-auto lg:hidden">
                <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path fill="currentColor"
                            d="M24 12l-5.657 5.657-1.414-1.414L21.172 12l-4.243-4.243 1.414-1.414L24 12zM2.828 12l4.243 4.243-1.414 1.414L0 12l5.657-5.657L7.07 7.757 2.828 12zm6.96 9H7.66l6.552-18h2.128L9.788 21z">
                        </path>
                    </svg> CV</span>
            </button>
        </a>
    </div>

        <div class="hidden lg:flex">
            <a href="cv/cvprueba.pdf" download="cvprueba.pdf">
                <button class="Btn">
                    <svg class="svgIcon" viewBox="0 0 384 512" height="1em" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                        </path>
                    </svg>
                    <span class="icon2"></span>
                    <span class="tooltip">Descargar CV</span>
                </button>
            </a>
        </div>
    </div>

    @push('botonCV')
        <style>
            .Btn {
                width: 50px;
                height: 50px;
                border: none;
                border-radius: 50%;
                background-color: black;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                position: relative;
                transition-duration: .3s;
                box-shadow: 2px 2px 4px rgba(59, 130, 246);
            }

            .svgIcon {
                fill: white;
            }

            .icon2 {
                width: 18px;
                height: 5px;
                border-bottom: 2px solid white;
                border-left: 2px solid white;
                border-right: 2px solid white;
            }

            .tooltip {
                position: absolute;
                right: -130px;
                opacity: 0;
                background-color: rgb(12, 12, 12);
                color: white;
                padding: 5px 10px;
                border-radius: 5px;
                display: flex;
                align-items: center;
                justify-content: center;
                transition-duration: .2s;
                pointer-events: none;
                letter-spacing: 0.5px;
            }

            .tooltip::before {
                position: absolute;
                content: "";
                width: 10px;
                height: 10px;
                background-color: rgb(12, 12, 12);
                background-size: 1000%;
                background-position: center;
                transform: rotate(45deg);
                left: -2%;
                transition-duration: .3s;
            }

            .Btn:hover .tooltip {
                opacity: 1;
                transition-duration: .3s;
            }

            .Btn:hover {
                background-color: rgb(59, 130, 246);
                transition-duration: .3s;
            }

            .Btn:hover .icon2 {
                border-bottom: 2px solid rgb(235, 235, 235);
                border-left: 2px solid rgb(235, 235, 235);
                border-right: 2px solid rgb(235, 235, 235);
            }

            .Btn:hover .svgIcon {
                fill: rgb(255, 255, 255);
                animation: slide-in-top 0.6s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            }

            @keyframes slide-in-top {
                0% {
                    transform: translateY(-10px);
                    opacity: 0;
                }

                100% {
                    transform: translateY(0px);
                    opacity: 1;
                }
            }
        </style>
    @endpush

    @push('letras')
        <script>
            var Messenger = function(el) {
                'use strict';
                var m = this;

                m.init = function() {
                    m.codeletters = "&#*+%?£@§$";
                    m.message = 0;
                    m.current_length = 0;
                    m.fadeBuffer = false;
                    m.messages = [
                        'Desarollador Web',
                        'Ingeniero En Sistemas'
                    ];

                    setTimeout(m.animateIn, 100);
                };

                m.generateRandomString = function(length) {
                    var random_text = '';
                    while (random_text.length < length) {
                        random_text += m.codeletters.charAt(Math.floor(Math.random() * m.codeletters.length));
                    }

                    return random_text;
                };

                m.animateIn = function() {
                    if (m.current_length < m.messages[m.message].length) {
                        m.current_length = m.current_length + 2;
                        if (m.current_length > m.messages[m.message].length) {
                            m.current_length = m.messages[m.message].length;
                        }

                        var message = m.generateRandomString(m.current_length);
                        el.innerHTML = message;

                        setTimeout(m.animateIn, 20);
                    } else {
                        setTimeout(m.animateFadeBuffer, 20);
                    }
                };

                m.animateFadeBuffer = function() {
                    if (m.fadeBuffer === false) {
                        m.fadeBuffer = [];
                        for (var i = 0; i < m.messages[m.message].length; i++) {
                            m.fadeBuffer.push({
                                c: (Math.floor(Math.random() * 12)) + 1,
                                l: m.messages[m.message].charAt(i)
                            });
                        }
                    }

                    var do_cycles = false;
                    var message = '';

                    for (var i = 0; i < m.fadeBuffer.length; i++) {
                        var fader = m.fadeBuffer[i];
                        if (fader.c > 0) {
                            do_cycles = true;
                            fader.c--;
                            message += m.codeletters.charAt(Math.floor(Math.random() * m.codeletters.length));
                        } else {
                            message += fader.l;
                        }
                    }

                    el.innerHTML = message;

                    if (do_cycles === true) {
                        setTimeout(m.animateFadeBuffer, 50);
                    } else {
                        setTimeout(m.cycleText, 2000);
                    }
                };

                m.cycleText = function() {
                    m.message = m.message + 1;
                    if (m.message >= m.messages.length) {
                        m.message = 0;
                    }

                    m.current_length = 0;
                    m.fadeBuffer = false;
                    el.innerHTML = '';

                    setTimeout(m.animateIn, 200);
                };

                m.init();
            }

            console.clear();
            var messenger = new Messenger(document.getElementById('messenger'));
        </script>
    @endpush
</div>
