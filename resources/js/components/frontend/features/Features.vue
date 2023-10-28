<template>
  <div class="w-full h-[100vh] overflow-y-scroll">
    <div class="w-full mt-4">
      <div class="container">
        <div>
          <p class="text-[24px] mb-4">Dictionary</p>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="dic-item cursor-pointer"
              v-for="(item, index) in dics"
              :key="index"
            > 
              <a :href="item.link" target="_blank" class="flex items-center justify-between">
                <div class="flex">
                  <img src width="84" height="84" :src="dicsImg" alt="">
                  <div class="ml-2 justify-evenly flex flex-col">
                    <div class="dictionary-tag">Dictionary</div>
                    <div class="text-[16px]">{{ item.name }}</div>
                  </div>
                </div>
               
                <div class="flex" style="white-space: nowrap;">
                  <div class="hidden lg:block text-[14px]">Open in new tab</div>
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4697 16.5303C13.1768 16.2374 13.1768 15.7626 13.4697 15.4697L16.9393 12L13.4697 8.53033C13.1768 8.23744 13.1768 7.76256 13.4697 7.46967C13.7626 7.17678 14.2374 7.17678 14.5303 7.46967L18.5303 11.4697C18.8232 11.7626 18.8232 12.2374 18.5303 12.5303L14.5303 16.5303C14.2374 16.8232 13.7626 16.8232 13.4697 16.5303Z" fill="#141416"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.75 12C18.75 12.4142 18.4142 12.75 18 12.75L6 12.75C5.58579 12.75 5.25 12.4142 5.25 12C5.25 11.5858 5.58579 11.25 6 11.25L18 11.25C18.4142 11.25 18.75 11.5858 18.75 12Z" fill="#141416"/>
                  </svg>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="mt-3">
          <p class="text-[24px] mb-4">Games</p>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class=" dic-item cursor-pointer"
              v-for="(item, index) in games"
              :key="index"
            > 
              <a :href="item.link" target="_blank" class="flex items-center justify-between">
                <div class="flex">
                  <img src width="84" height="84" :src="gameImg" alt="">
                  <div class="ml-2 justify-evenly flex flex-col">
                    <div class="game-tag">Game</div>
                    <div class="text-[16px]">{{ item.name }}</div>
                  </div>
                </div>
               
                <div class="flex" style="white-space: nowrap;">
                  <div class="hidden lg:block text-[14px]">Open in new tab</div>
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4697 16.5303C13.1768 16.2374 13.1768 15.7626 13.4697 15.4697L16.9393 12L13.4697 8.53033C13.1768 8.23744 13.1768 7.76256 13.4697 7.46967C13.7626 7.17678 14.2374 7.17678 14.5303 7.46967L18.5303 11.4697C18.8232 11.7626 18.8232 12.2374 18.5303 12.5303L14.5303 16.5303C14.2374 16.8232 13.7626 16.8232 13.4697 16.5303Z" fill="#141416"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.75 12C18.75 12.4142 18.4142 12.75 18 12.75L6 12.75C5.58579 12.75 5.25 12.4142 5.25 12C5.25 11.5858 5.58579 11.25 6 11.25L18 11.25C18.4142 11.25 18.75 11.5858 18.75 12Z" fill="#141416"/>
                  </svg>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      dicsImg: require('../../../../../public/images/landing/dics.svg'),
      gameImg: require('../../../../../public/images/landing/games.svg'),
      dics: [
        {
          name: "Oxford Learner's Dictionaries",
          link: 'https://www.oxfordlearnersdictionaries.com/'
        },
        {
          name: "Cambridge – Cambridge Dictionary",
          link: 'https://dictionary.cambridge.org/dictionary/english/'
        },
        {
          name: "Từ điển Ozdiz – Tra Collocation tiện lợi",
          link: 'https://ozdic.com/'
        },
        {
          name: "Longman Dictionary",
          link: 'https://www.ldoceonline.com/'
        },
        {
          name: "Từ điển Anh – Việt cho trình độ căn bản",
          link: 'https://dict.laban.vn/?utm_content=tu-dien-tieng-anh&utm_source=SEO&utm_medium=Blog'
        },
        {
          name: "VnDict.net: Từ điển Anh Việt online tốt nhất",
          link: 'http://6.vndic.net/'
        },
        {
          name: "soha vn: Từ điển Anh Việt online miễn phí",
          link: 'http://tratu.soha.vn/'
        },
        {
          name: "Cồ Việt – Lạc Việt: Từ điển Anh Việt online có phiên âm",
          link: 'http://tratu.coviet.vn/'
        },
      ],
      games: [
        {
          name: "Classroom-objects",
          link: 'https://quizlet.com/vn/842122692/classroom-objects-flash-cards/?i=106ec2&x=1jqt'
        },
        {
          name: "Classroom-language",
          link: 'https://quizlet.com/vn/842123151/classroom-language-flash-cards/?i=106ec2&x=1jqt'
        },
        {
          name: "Wheel-of-fortune",
          link: 'https://quizlet.com/vn/842123413/wheel-of-fortune-flash-cards/?i=106ec2&x=1jqt'
        },
        {
          name: "Action-verbs",
          link: 'https://quizlet.com/vn/842124057/action-verbs-flash-cards/?i=106ec2&x=1jqt'
        },
        {
          name: "Fruits",
          link: 'https://quizlet.com/vn/842124274/fruits-flash-cards/?i=106ec2&x=1jqt'
        },
        {
          name: "Family -Code",
          link: 'https://quizizz.com/embed/quiz/6199ab635d6f61001d3080ae'
        },
        {
          name: "Tense practice- Review 1",
          link: 'https://quizizz.com/embed/quiz/6534dc9b77ca9af5c13fd943'
        },
        {
          name: "Conditional Sentences 1",
          link: 'https://quizizz.com/embed/quiz/6534e53584539732808c6eb3'
        },
        {
          name: "MIXED TENSES ADVANCED",
          link: 'https://quizizz.com/embed/quiz/6534e8549311309253ee64db'
        },
        {
          name: "Travel- Vocab 1",
          link: 'https://quizizz.com/embed/quiz/6534a728be9c1b15f93edb33'
        },
        {
          name: "Travel- Vocab 2",
          link: 'https://quizizz.com/embed/quiz/6534a70f19af4b6501580af0'
        },
        {
          name: "Gerund and Infinitive",
          link: 'https://quizizz.com/embed/quiz/6534e4ef931130b53aee61d8'
        },
        {
          name: "CONDITIONAL sentences 1,2,3",
          link: 'https://quizizz.com/embed/quiz/6534e622b0ee404e0f89a16c'
        }, 
        {
          name: "CONDITIONAL SENTENCES & WISH SENTENCES",
          link: 'https://quizizz.com/embed/quiz/6534e68984539752278c6fb1'
        },
        {
          name: "FAMILY",
          link: 'https://quizizz.com/embed/quiz/6534f0633237947a62796bf9'
        },
        {
          name: "WEATHER",
          link: 'https://quizizz.com/embed/quiz/6534f0633237947a62796bf9'
        },
        {
          name: "WEATHER",
          link: 'https://quizizz.com/embed/quiz/6534f0633237947a62796bf9'
        },
        {
          name: "Reading 1",
          link: 'https://quizizz.com/embed/quiz/6534f170016edc65a0b82290'
        },
        {
          name: "English Vocab **",
          link: 'https://quizizz.com/embed/quiz/6534f297845397c7ef8c7a78'
        },
      ]
    };
  },
};
</script>
<style scoped>
.dictionary-tag {
  background-color: #cad8f8;
  color: #2162FF;
  font-size: 14px;
  font-style: normal;
  font-weight: 700;
  line-height: 24px; /* 171.429% */
  letter-spacing: 1.4px;
  text-transform: uppercase;
  width: fit-content;
  border-radius: 5px;
  padding: 3px 5px;
}

.game-tag {
  background-color: #cae8d4;
  color: #24B24C;
  font-size: 14px;
  font-style: normal;
  font-weight: 700;
  line-height: 24px; /* 171.429% */
  letter-spacing: 1.4px;
  text-transform: uppercase;
  width: fit-content;
  border-radius: 5px;
  padding: 3px 5px;
}
.dic-item {
  padding: 8px;
  background-color: #f4f5f6;
  border-radius: 5px;
}
.dic-item a, .dic-item a:hover {
  text-decoration: none;
  color: unset;
}
</style>
