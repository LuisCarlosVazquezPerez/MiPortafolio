<div>

    <div>
        <h2 class="text-center text-4xl sm:text-5xl md:text-4xl lg:text-5xl   xl:text-8xl">Hola Soy</h2>
        <h2 class="text-center text-7xl sm:text-8xl md:text-5xl lg:text-8xl   xl:text-9xl    font-bold text-blue-500">
            Luis Carlos</h2> 
    </div>

    <div class="h-10">
        <div id="messenger"
            class="text-2xl sm:text-3xl md:text-2xl lg:text-3xl xl:text-4xl  text-blue-600 text-center font-bold"></div>
    </div>

    <div class="flex justify-center mt-4 md:justify-center lg:justify-end md:mt-0">
        <button class="cssbuttons-io w-full md:w-auto">
            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M24 12l-5.657 5.657-1.414-1.414L21.172 12l-4.243-4.243 1.414-1.414L24 12zM2.828 12l4.243 4.243-1.414 1.414L0 12l5.657-5.657L7.07 7.757 2.828 12zm6.96 9H7.66l6.552-18h2.128L9.788 21z"></path></svg> CV</span>
          </button>
    </div>
    

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
