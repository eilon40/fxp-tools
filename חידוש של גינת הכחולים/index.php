<?php
$id = $_GET['c'] ?? die();
$obj = json_decode(file_get_contents('https://fxptest.000webhostapp.com/temp/?id=' . $id));

if (!isset($obj->time)) die();
if ($id == 4) {
    echo '<script>
    alert("זמין רק עם התוסף של צוות תמיכה");const items = [1129410,1411943,1195305,982142,1313808,1206586];const rand = items[Math.floor(Math.random() * items.length)];window.location.href = "https://www.fxp.co.il/member.php?u=" + rand + "#footer";</script>';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>גינת הכחולים • <?= $obj->title ?></title>
        <link rel="icon" type="image/png" href="images/icon.png" />

        <style>
        body {
            font-family: Arial;
        }
        form {
            display: inline-block;
        }
        .divhed {
            zoom: 1; width: 980px;
            width: 979.9px \0/IE9;
            margin-left: auto;
            margin-right: auto;
            text-align: right;
            padding: 0px 0px 0px 0px;
            position: relative;
        }
        </style>
    </head>
    <body dir="rtl">

        <center>
            <div id="online" style="display:none;">0</div>

            <img src="images/logo.png" alt="logo" title='עוצב ע"י אבישי מפקח גרפיקה ואומנות' /><br />
            <form onsubmit="handleSubmit(event)"><input type="submit" value="צור רף יומי" /></form>
            <form onsubmit="handleStat(event)">
                <a href="custom2.html">עיצוב מותאם אישית</a>
                <input type="submit" value="צור סטטיסטיקה שבועית" />
            </form>
            <form onsubmit="nocomm(event)">
                <input type="submit" value="חפש אשכולות ללא מענה"/>
            </form>

            <form onsubmit="onSubmitCheck(event)">
                <input type="text" name="username" placeholder="שם משתמש" required />
                    <select name="forum">
                        <option value="">--אנא בחר פורום--</option>
                
                        <?php foreach ($obj->forums as $forum):
                            echo '<option value="' .$forum->id . '">' . $forum->title . '</option>';
                        endforeach; ?>
                    </select>
                    <select name="manager">
                        <?php 
                        echo '<option value="">--אנא בחר מנהל--</option>';
                        foreach ($obj->forums as $forum):
                            if (isset($forum->members)) {
                                foreach ($forum->members as $member => $value):
                                    echo '
                                    <option value="' .
                                            $value .
                                            '">' .
                                            $member .
                                            '</option>';
                                endforeach;
                            }    
                        endforeach; ?>
                    </select>

        
                    <input type="submit" value='בדוק מועמד / צור ממו"ח' />
        
                </fieldset>
            </form>

        </center>
        
                    <div id="resultel"></div>

* העקיפה לחיפוש הודעות ללא הגבלה תוקנה בעקבות כך יתכן שהרף היומי ובדיקת מועמד יחזירו תוצאות שגויות
<br/>
  *     מבדיקות שערכתי האתר באחסון הנוכחי מאפשר לקבל תוצאות תוך 10 עד 20 שניות <br>
ועוד שבאחסון פרטי יכול לקחת עד 1 ל4 שניות
מנסה לחפש אחסון אחר על מנת לאפשר ביצועים טובים יותר
        <style>
        .swal-text {
            direction: rtl; 
        }
        .footer {
            display: flex;
            flex-flow: row wrap;
            padding: 30px 30px 20px 30px;
            color: #2f2f2f;
            background-color: #fff; 
            border-top: 1px solid #e5e5e5; 
            margin-top: 20px;
            font-family: var(--fxp2020-almoni-family);
            box-shadow: var(--fxp2020-box-result-open-search);
        }
        .footer__logo .site-icon-holder {
            position: relative;
        }
        #fxp_logo_img_footer {
            width: 70px;
            float: right;
            margin-left: 14px;
        }
        .footer > * {
            flex:  1 100%;
        }
        .footer__addr {
            margin-right: 1.25em;
            margin-bottom: 2em;
        }
        .footer__logo {
            font-family: var(--fxp2020-almoni-family);
            font-weight: 400;
            text-transform: lowercase;
            font-size: 1.5rem;
        }
        .footer__addr h2 {
            /* margin-top: 1.3em; */
            font-size: 15px;
            font-weight: 400;
        }
        .nav__title {
            font-weight: 400;
            font-size: 15px;
            margin-bottom: 5px;
        }
        .footer address {
            font-style: normal;
            color: #999;
        }
        .footer__btn {
            display: flex;
            color: white;
            align-items: center;
            justify-content: center;
            height: 36px;
            max-width: max-content;
            background-color: var(--fxp2020-blue-color);
            border-radius: 100px;
            line-height: 0;
            margin: 0px 5px;
            float: right;
            padding: 0 10px;
            transition: background-color 0.2s;
        }
        .footer__btn:hover {
            background-color: var(--fxp2020-blue-color-hover);
            color:white;
        }
        .contact__btn__container {
            margin-top: 20px;
        }
        .footer ul {
            list-style: none;
            padding-left: 0;
        }
        .footer__nav {
            display: flex;
            flex-flow: row wrap;
        }
        .footer__nav > * {
            flex: 1 50%;
            margin-right: 1.25em;
        }
        .nav__ul a {
            color: #999;
        }
        @media screen and (min-width: 24.375em) {
            .legal .legal__links {
                margin-left: auto;
            }
        }
        @media screen and (min-width: 40.375em) {
            .footer__nav > * {
                flex: 1;
            }
            .footer__addr {
                flex: 0.3 0px;
            }
            .footer__nav {
                flex: 2 0px;
            }
        }
        .footer .site-icon-holder {
            padding: unset;
        }
                .autocomplete-suggestions {
            text-align: left; cursor: default; border: 1px solid #ccc; border-top: 0; background: #fff; box-shadow: -1px 1px 3px rgba(0,0,0,.1);
        
            /* core styles should not be changed */
            position: absolute; display: none; z-index: 9999; max-height: 254px; overflow: hidden; overflow-y: auto; box-sizing: border-box;
        }
        .autocomplete-suggestion { position: relative; padding: 0 .6em; line-height: 23px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size: 1.02em; color: #333; }
        .autocomplete-suggestion b { font-weight: normal; color: #1f8dd6; }
        .autocomplete-suggestion.selected { background: #f0f0f0; }

        </style>
	<footer class="footer">
            <div class="footer__addr">
                <div class="footer__logo">
                    <div class="site-icon-holder">
                        <a target="_parent" title="fxp" href="https://www.fxp.co.il">
                            <img id="fxp_logo_img_footer" class="fxp_logo_img_hv loading" border="0" alt="fxp" src="./images/icon.png" title="fxp" data-ll-status="loading" />
                        </a>
                    </div>
                </div>
            </div>
            <ul class="footer__nav">
                <li class="nav__item">
                    <h2 class="nav__title">תוספי עזר</h2>
                    <ul class="nav__ul">
                        <li>
                            <div class="setlinks">
                                <a href="https://greasyfork.org/he/scripts/410121-%D7%94%D7%9E%D7%A9%D7%A8%D7%AA%D7%AA-%D7%A9%D7%9C-%D7%A0%D7%99%D7%91">המשרתת של ניב</a>
                            </div>
                        </li>
                        <li>
                            <div class="setlinks">
                                <a href="https://greasyfork.org/he/scripts/404540-%D7%94%D7%A9%D7%95%D7%98%D7%A8-%D7%A9%D7%9C-%D7%A0%D7%99%D7%91">השוטר של ניב</a>
                            </div>
                        </li>
                        <li>
                            <div class="setlinks">
                                <a href="https://greasyfork.org/he/scripts/396903-anti-fishing">anti fishing</a>
                            </div>
                        </li>
                        <li>
                            <div class="setlinks">
                                <a href="javascript:alert('בתהליך אישור פרסום')">מפתח הברגים של ניב</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="nav__item">
                    <h2 class="nav__title">כלים חיצונים</h2>
                    <ul class="nav__ul">
                        <li>
                            <div class="setlinks">
                                <!--<a href="https://whoami-fxp-tool.000webhostapp.com/old/tool.php">הודעה למנהל חדש</a>-->
                                <a href="https://eilon40.github.io/fxp-tools/%D7%94%D7%99%D7%9B%D7%9C%20%D7%94%D7%AA%D7%94%D7%99%D7%9C%D7%94.html">היכל התהילה</a>
                            </div>
                        </li>
                        <li>
                            <div class="setlinks">
                                <a href="https://avishaidv.github.io/fxp_tatnick/" target="_blank">יצירת ניק מעוצב</a>
                            </div>
                        </li>
                        <li>
                            <div class="setlinks">
                                <a href="https://supervisor-tools-fxp.vercel.app/" target="_blank">PikuahToolV1</a>
                            </div>
                        </li>
                        <li>
                            <div class="setlinks">
                                <a href="https://eilon40.github.io/fxp-tools/" target="_blank">אירוחים</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="nav__item">
                    <h2 class="nav__title">עדכון המידע האחרון בוצע בתאריך:</h2>
                    <ul class="nav__ul">
                        <li>
                            <div class="setlinks">
                                <?= date("Y-m-d H:i:s", $obj->time + 7200) ?>
                            </div>
                        </li>
                    </ul>


                </li> 
            </ul>
        </footer>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="./auto-complete.min.js"></script>

        <script>
        const database = <?= json_encode($obj) ?>;
     new autoComplete({
        selector: 'input[name=username]',
        minChars: 2,
        source: async function(name, suggest){


            try {
                const data = await apiFetch('user.php?user=' + name)

                let matches = []  
                for (i=0; i< data.length; i++) {
                    matches.push(data[i].usernamenormal);
                }    
                suggest(matches);
            } catch(e) {
                console.log('not found');
            }
         }
    });
       
        function copyText(text) {
            navigator.clipboard.writeText(text).then(function() {
                console.log('Async: Copying to clipboard was successful!');
                Swal.fire({
                    position: 'center',
                    title: 'BBcode Copied',
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false,
                })
            }, function(err) {
                console.error('Async: Could not copy text: ', err);
                Swal.fire({
                    position: 'center',
                    title: 'Error!',
                    icon: 'error',
                    text: err,
                    timer: 2000,
                    showConfirmButton: false,
                })
            });
        }
        
        async function handleSubmit(event)  {
            console.time('raff yoami');
            event.preventDefault();
            toggle()
            const { owners, forums } = database,
                admins = [...new Set(Object.values(forums).flatMap(({ members }) => Object.keys(members || {})))],
                all = [...new Set([...admins, ...owners])];
                requests = await Promise.all(all.map(m => apiFetch('raff.php?user='+m+'&only'))),
                console.log(requests);
                temp = requests.reduce((o, v, i) => ({ ...o, [all[i]]: v }), {}),
                //temp = all.reduce(async (o, e) => ({...o, [e]: await fxp.userData(e, 1) }), {}),
                daily = owners.filter(s => temp[s] >= 20),
                notpass = owners.filter(el => daily.indexOf(el) === -1);
            let message = owners.length ? "" : "אין מפקחים";
            if (daily.length) message += daily.join(" ו") + " " + (daily.length > 1 ? "עברו" : "עבר");
            if (daily.length && notpass.length) message += ", ";
            if (notpass.length) message += notpass.join(" ו") + " " + (notpass.length > 1 ? "לא עברו" : "לא עבר");
            const bbcode =
            `תאריך: ${new Date().toLocaleDateString("he")}
            רף מפקחים: ${message}
            כמות מנהלים בקטגוריה: ${admins.length}
            כמות מנהלים שעברו את הרף: ${admins.filter(c => temp[c] >= 7).length}
            מוצדקים: 0`.replace(/            /g,'');
            copyText(bbcode)
            const html = all.map(user =>`${user} עשה <a href="https://www.fxp.co.il/search.php?search_type=1&contenttype=vBForum_Post&searchuser=${user}&childforums=0&exactname=1&replyless=0&searchdate=1&beforeafter=after&starteronly=0&showposts=1&do=process" target="_blank">${temp[user]}</a> הודעות היום`);
            resultel.innerHTML = '<b style="color:red">לא מציג הודעות שנשלחו בחדרי הנהלה ומעלה</b><br/><b>לבדיקת התוצאות לחצו על המספר</b><br/>' + html.join("<br/>");
            resultel.innerHTML += '<pre>' + bbcode + '</pre>';
            toggle()
            console.timeEnd('raff yoami');
        }

        async function handleStat(event) {
            event.preventDefault();
            alert('בתהליך חידוש');
            //old code
            // e.submitter.disabled = true;
            // const {n, w, m, h, d} = localStorage;
            // let html = bbcode = ''
            // bbcode += cl(h||'')
            // for (const {forumid, title, activeThreads, admins} of requests) {
            //     html += `<b style="float:right">${title} = ${activeThreads == 200 ? '200+': activeThreads}</b><br/><a href="https://www.fxp.co.il/forumdisplay.php?f=${forumid}&daysprune=7&pp=200"> קישור לבדיקה עצמית </a><br/>`;
            //     if (admins === null) {
            //         bbcode += (d||'').replace(/@FREE@/,title).replace(/@DDR@/,forumid).replace(/@DD@/, activeThreads);
            //         continue;
            //     }
            //     for (const [index, {messages, threads, userid, username}] of Object.entries(admins)) {
            //         bbcode += ((index == 0 ? m:w) ?? '').replace(/@GG@/,messages).replace(/@OFEK@/,threads).replace(/@FREE@/,title).replace(/@MUFFIN@/,username).replace(/@ID@/,userid).replace(/@DDR@/,forumid).replace(/@DD@/, activeThreads == 200 ? '200+': activeThreads)
            //         html += `<div dir="rtl">${username} עשה <a href="https://www.fxp.co.il/search.php?search_type=1&contenttype=vBForum_Post&searchuser=${encodeURIComponent(username)}&childforums=0&exactname=1&replyless=0&searchdate=7&beforeafter=after&starteronly=0&showposts=1&forumchoice[]=${forumid}&do=process" target="_blank">${messages}</a> הודעות ו <a href="https://www.fxp.co.il/search.php?search_type=1&contenttype=vBForum_Post&searchuser=${encodeURIComponent(username)}&childforums=0&exactname=1&replyless=0&searchdate=7&beforeafter=after&starteronly=1&showposts=1&forumchoice[]=${forumid}&do=process" targe="_blank">${threads}</a> אשכולות השבוע</div>`;
            //     }
            // }
            // bbcode += cl(n||'');
            // if (bbcode != '') {
            //     copyText(bbcode);
            // }
            // result.innerHTML = html;
            // pre.innerText = bbcode;
            // e.submitter.disabled = false;
        }

        async function onSubmitCheck(event) {
            //todo
            //ליצור מערכת תבניות
            // userscript שמכריז ושולח הודעות באופן אוטומטי
            // הסבר למנהל ולמשתמש
            console.time();
            event.preventDefault();
            toggle()
            let bbcode;
            const forum =  event.target.forum.value;
            const username = event.target.username.value;
            const select = event.target.manager;
            if (select.value && forum) {
                //todo שבןעי   
                alert('שבועי');
            }
            else if (select.value) {
                            const mres = prompt('הזמן מדוע נבחר מנהל זה');
            const ures = prompt('הזמן מדוע נבחר משתמש זה');

                const user = await apiFetch('profile.php?username=' + username);
                bbcode = `
                [CENTER]
                [TABLE="width: 900, align: center"]
                [TR]
                    [TD][IMG]https://images.weserv.nl/?url=i.imgur.com/9ant8gJ.png[/IMG][/TD]
                [/TR]
                [/TABLE]
            
                [TABLE="width: 900, align: center"]
                [TR="bgcolor: #76ACE4"]
                [TD="align: center"][FONT=&amp][COLOR=#ffffff][SIZE=6][B]מנהל החודש:[/B][/SIZE][/COLOR][/FONT][/TD]
                [TD="align: center"][FONT=&amp][COLOR=#ffffff][SIZE=6][B]משתמש החודש:[/B][/SIZE][/COLOR][/FONT][/TD]
                [/TR]
                [TR]
                [TD="align: center"][URL="https://www.fxp.co.il/member.php?u=${select.value}"][COLOR=#ffa500][FONT=&amp][SIZE=4][B]${select.selectedOptions[0].text}[/B][/SIZE][/FONT][/COLOR][/URL][/TD]
                [TD="align: center"][URL="https://www.fxp.co.il/member.php?u=${user.user_id}"][COLOR=#000000][SIZE=4]${user.username}[/SIZE][/COLOR][/URL][/TD]
                [/TR]
                [TR]
                [TD="align: center"][FONT=open sans hebrew]${mres}[/FONT][/TD]
                [TD="align: center"][FONT=open sans hebrew]${ures}[/FONT][/TD]
                [/TR]
                [/TABLE]
                [/CENTER]`;
            } else if (forum) {
                const profile = await apiFetch('profile.php?username=' + username);
                const raff = await apiFetch('raff.php?user=' + username + '&id=' + forum);
                const uncomments = await apiFetch('uncommentsv2.php?f=' + forum);

                bbcode =`
                [TABLE="width: 500"]
                [TR]
                [TD]שם משתמש[/TD]
                [TD][URL="https://www.fxp.co.il/member.php?u=${profile.user_id}"]${profile.username}[/URL][/TD]
                [/TR]
                [TR]
                [TD]פורום[/TD]
                [TD][URL="https://www.fxp.co.il/forumdisplay.php?f=${forum}"]${database.forums[forum].title}[/URL][/TD]
                [/TR]
                [TR]
                [TD]שבועי[/TD]
                [TD]${raff.week}[/TD]
                [/TR]
                [TR]
                [TD]דו-שבועי[/TD]
                [TD]${raff.two_weeks}[/TD]
                [/TR]
                [TR]
                [TD]חודשי[/TD]
                [TD]${raff.month}[/TD]
                [/TR]
                [TR]
                [TD]וותק[/TD]
                [TD]${profile.join_date}[/TD]
                [/TR]
                [TR]
                [TD]הודעות[/TD]
                [TD]${profile.messages}[/TD]
                [/TR]
                [TR]
                [TD]אזהרות[/TD]
                [TD][/TD]
                [/TR]
                [TR]
                [TD]האם קיבל באנים בחצי השנה האחרונה?[/TD]
                [TD][/TD]
                [/TR]
                [TR]
                [TD]האם מוגבל לאישור מנכ"ל?[/TD]
                [TD][/TD]
                [/TR]
                [TR]
                [TD]כמות האשכולות הנפתחים בפורום (לא פעילים).[/TD]
                [TD]${uncomments.filter(Boolean).length}[/TD]
                [/TR]
                [TR]
                [TD]הערות[/TD]
                [TD][/TD]
                [/TR]
                [/TABLE]`
            } else {
                            toggle()
                return alert('אנא בחר פעולה')
                
            }
            copyText(bbcode);
            resultel.innerText = bbcode;
            toggle()
            console.timeEnd();
        }

        async function apiFetch(parameters) {
            const domain = 'https://fxptest.000webhostapp.com/fxpapi/';
            const url = domain + parameters;
            const response = await fetch(url);
            if (!response.ok) {
                alert(parameters);
                return false;
            }
            return await response.json();
        }

        async function nocomm(event) {
            console.time('uncomments');
            event.preventDefault();
                        toggle()

            const responses = database.list.flatMap(async function(forumID) {
                const data = await apiFetch('uncommentsv2.php?f=' + forumID);
                return data.filter(Boolean).join('<br />');
            })
            const data = await Promise.all(responses);
            resultel.innerHTML = data.filter(Boolean).join('<br />'); 
            const code = 'javascript:copyText([...document.querySelectorAll(\'[data-copy]\')].map(element => element.dataset.copy).join(\'\\n\'))';
            resultel.innerHTML += '<br /><br /><button onclick="'+code+'">העתק BBCODE</button>' 
            toggle()
            console.timeEnd('uncomments');
        }
        
            function toggle(string) {
                const buttons = document.querySelectorAll('input[type=submit]');
                for (button of buttons) {
                    button.disabled = !button.disabled
                }
            }

        </script>
    </body>
</html>
