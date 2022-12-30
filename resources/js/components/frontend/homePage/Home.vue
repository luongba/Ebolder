<template>
    <div class="w-full">
        <header-component />
        <h2 class="text-[42px] font-semibold leading-[120%] text-center">
            <p>
                Giải pháp tối ưu dành cho người học
                <strong class="strong">tiếng anh</strong>
            </p>

            <p>từ mức độ dễ đến khó !</p>
        </h2>
        <div class="text-[16px] text-center my-4">
            <p>Không cần cài đặt phần mềm phức tạp.</p>
            <p>
                Học luôn trên trang web,
                <span class="text-[#5ebbff]">có rất nhiều đề </span> để bạn tha hồ thử
                sức.
            </p>
        </div>
        <button
            @click="openLink"
            class="cursor-pointer px-4 py-2 text-center uppercase leading-[28px] flex items-center justify-center font-light rounded-md bg-button text-[19px] text-white mx-auto hover:opacity-80"
        >
            Thử sức ngay
        </button>
        <div class="w-full relative mt-[64px]">
            <div class="absolute left-0 top-[110px]">
                <img src="/images/bg/landing_page_background_item1.png" alt="" />
            </div>
            <div
                class="py-[134px] px-[134px] max-w-[1206px] bg-blur-f mx-auto mt-4 relative"
            >
                <div class="grid grid-cols-5 gap-4">
                    <h2 class="text-[28px] font-semibold leading-[120%] col-span-3">
                        <p>Học tiếng anh bước khởi đầu để bước chân ra ngoài thế giới</p>
                    </h2>
                    <ul class="col-span-2">
                        <li class="flex items-start mb-4">
                            <div
                                class="bg-description flex items-center justify-center mr-4"
                            >
                                <i
                                    class="el-icon-s-help text-center text-[20px] text-white"
                                ></i>
                            </div>
                            <p class="flex-1 text-[16px]">
                                Tổng hợp các dạng đề tiếng anh mới, với những câu hỏi hay,
                                thú vị, hệ thống giao diện trực quan
                                <span class="text-[#5ebbff]"
                                    >dễ dàng thao tác sử dụng
                                </span>
                                phù hợp với mọi lứa tuổi.
                            </p>
                        </li>
                        <li class="flex items-start mb-4">
                            <div
                                class="bg-description flex items-center justify-center mr-4"
                            >
                                <i
                                    class="el-icon-s-help text-center text-[20px] text-white"
                                ></i>
                            </div>
                            <p class="flex-1 text-[16px]">
                                Bộ 4 module đề thi bao gồm Listening, Reading, Vocabulary,
                                Grammar cung cấp
                                <span class="text-[#5ebbff]">đầy đủ </span>
                                mọi dạng đề cho bạn thỏa sức ôn luyện.
                            </p>
                        </li>
                        <li class="flex items-start mb-4">
                            <div
                                class="bg-description flex items-center justify-center mr-4"
                            >
                                <i
                                    class="el-icon-s-help text-center text-[20px] text-white"
                                ></i>
                            </div>
                            <p class="flex-1 text-[16px]">
                                Bộ đề được soạn thảo bởi giáo viên tiếng anh có
                                <span class="text-[#5ebbff]">Nhiều năm kinh nghiệm</span>
                                trong việc giảng dạy.
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="absolute bottom-[-80px] left-[90px]">
                    <img src="images/bg/landing_page_hero_image.png" alt="" />
                </div>
            </div>
        </div>
        <div class="w-full mt-[128px] relative">
            <div class="absolute right-0 top-[-112px]">
                <img src="/images/bg/landing_page_background_item2.png" alt="" />
            </div>
            <h2 class="text-[42px] font-semibold leading-[120%] text-center">
                <p>Bạn sẽ học được</p>

                <p>những gì ?</p>
            </h2>
            <ul class="grid grid-cols-4 gap-4 max-w-[980px] mx-auto mt-[32px]">
                <li>
                    <ul>
                        <li class="flex items-center text-[16px] mt-4">
                            <i class="el-icon-check"></i>
                            <span class="ml-2">Cấu trúc tiếng anh</span>
                        </li>
                        <li class="flex items-center text-[16px] mt-4">
                            <i class="el-icon-check"></i>
                            <span class="ml-2">Cấu trúc tiếng anh</span>
                        </li>
                        <li class="flex items-center text-[16px] mt-4">
                            <i class="el-icon-check"></i>
                            <span class="ml-2">Cấu trúc tiếng anh</span>
                        </li>
                        <li class="flex items-center text-[16px] mt-4">
                            <i class="el-icon-check"></i>
                            <span class="ml-2">Cấu trúc tiếng anh</span>
                        </li>
                        <li class="flex items-center text-[16px] mt-4">
                            <i class="el-icon-check"></i>
                            <span class="ml-2">Cấu trúc tiếng anh</span>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li class="flex items-center text-[16px] mt-4">
                            <i class="el-icon-check"></i>
                            <span class="ml-2">Cấu trúc tiếng anh</span>
                        </li>
                        <li class="flex items-center text-[16px] mt-4">
                            <i class="el-icon-check"></i>
                            <span class="ml-2">Cấu trúc tiếng anh</span>
                        </li>
                        <li class="flex items-center text-[16px] mt-4">
                            <i class="el-icon-check"></i>
                            <span class="ml-2">Cấu trúc tiếng anh</span>
                        </li>
                        <li class="flex items-center text-[16px] mt-4">
                            <i class="el-icon-check"></i>
                            <span class="ml-2">Cấu trúc tiếng anh</span>
                        </li>
                        <li class="flex items-center text-[16px] mt-4">
                            <i class="el-icon-check"></i>
                            <span class="ml-2">Cấu trúc tiếng anh</span>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li class="flex items-center text-[16px] mt-4">
                            <i class="el-icon-check"></i>
                            <span class="ml-2">Cấu trúc tiếng anh</span>
                        </li>
                        <li class="flex items-center text-[16px] mt-4">
                            <i class="el-icon-check"></i>
                            <span class="ml-2">Cấu trúc tiếng anh</span>
                        </li>
                        <li class="flex items-center text-[16px] mt-4">
                            <i class="el-icon-check"></i>
                            <span class="ml-2">Cấu trúc tiếng anh</span>
                        </li>
                        <li class="flex items-center text-[16px] mt-4">
                            <i class="el-icon-check"></i>
                            <span class="ml-2">Cấu trúc tiếng anh</span>
                        </li>
                        <li class="flex items-center text-[16px] mt-4">
                            <i class="el-icon-check"></i>
                            <span class="ml-2">Cấu trúc tiếng anh</span>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li class="flex items-center text-[16px] mt-4">
                            <i class="el-icon-check"></i>
                            <span class="ml-2">Cấu trúc tiếng anh</span>
                        </li>
                        <li class="flex items-center text-[16px] mt-4">
                            <i class="el-icon-check"></i>
                            <span class="ml-2">Cấu trúc tiếng anh</span>
                        </li>
                        <li class="flex items-center text-[16px] mt-4">
                            <i class="el-icon-check"></i>
                            <span class="ml-2">Cấu trúc tiếng anh</span>
                        </li>
                        <li class="flex items-center text-[16px] mt-4">
                            <i class="el-icon-check"></i>
                            <span class="ml-2">Cấu trúc tiếng anh</span>
                        </li>
                        <li class="flex items-center text-[16px] mt-4">
                            <i class="el-icon-check"></i>
                            <span class="ml-2">Cấu trúc tiếng anh</span>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="w-full mt-[128px] px-[128px]">
            <h2 class="text-[42px] font-semibold leading-[120%] text-center">
                <p>Tại sao nên học ở đây ?</p>
            </h2>
            <div class="w-full grid grid-cols-3 gap-4 w-[1124px] mt-[64px] mx-auto">
                <div class="p-[32px] bg-blur-f mx-auto relative">
                    <span class="text-[40px] color-gadient">
                        <i class="el-icon-s-management"></i>
                    </span>
                    <p class="text-[20px] mt-4 font-semibold">Trực quan</p>
                    <ul>
                        <li class="text-[16px] mt-2">
                            Hệ thống làm bài kiểm tra tân tiến
                        </li>
                        <li class="text-[16px] mt-2">
                            Hệ thống làm bài kiểm tra tân tiến
                        </li>

                        <li class="text-[16px] mt-2">
                            Hệ thống làm bài kiểm tra tân tiến
                        </li>

                        <li class="text-[16px] mt-2">
                            Hệ thống làm bài kiểm tra tân tiến
                        </li>

                        <li class="text-[16px] mt-2">
                            Hệ thống làm bài kiểm tra tân tiến
                        </li>
                    </ul>
                </div>
                <div class="p-[32px] bg-blur-f mx-auto relative">
                    <span class="text-[40px] color-gadient">
                        <i class="el-icon-s-management"></i>
                    </span>
                    <p class="text-[20px] mt-4 font-semibold">Trực quan</p>
                    <ul>
                        <li class="text-[16px] mt-2">
                            Hệ thống làm bài kiểm tra tân tiến
                        </li>
                        <li class="text-[16px] mt-2">
                            Hệ thống làm bài kiểm tra tân tiến
                        </li>

                        <li class="text-[16px] mt-2">
                            Hệ thống làm bài kiểm tra tân tiến
                        </li>

                        <li class="text-[16px] mt-2">
                            Hệ thống làm bài kiểm tra tân tiến
                        </li>

                        <li class="text-[16px] mt-2">
                            Hệ thống làm bài kiểm tra tân tiến
                        </li>
                    </ul>
                </div>
                <div class="p-[32px] bg-blur-f mx-auto relative">
                    <span class="text-[40px] color-gadient">
                        <i class="el-icon-s-management"></i>
                    </span>
                    <p class="text-[20px] mt-4 font-semibold">Trực quan</p>
                    <ul>
                        <li class="text-[16px] mt-2">
                            Hệ thống làm bài kiểm tra tân tiến
                        </li>
                        <li class="text-[16px] mt-2">
                            Hệ thống làm bài kiểm tra tân tiến
                        </li>

                        <li class="text-[16px] mt-2">
                            Hệ thống làm bài kiểm tra tân tiến
                        </li>

                        <li class="text-[16px] mt-2">
                            Hệ thống làm bài kiểm tra tân tiến
                        </li>

                        <li class="text-[16px] mt-2">
                            Hệ thống làm bài kiểm tra tân tiến
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="w-full mt-[128px] relative">
            <div class="absolute left-0 top-0">
                <img src="/images/bg/landing_page_background_item3.png" alt="" />
            </div>
            <div class="py-[134px] px-[134px] max-w-[1124px] bg-blur-f mx-auto relative">
                <div class="absolute right-[-35px] top-[-12px]">
                    <img src="/images/bg/landing-bottom-bg.png" alt="" />
                </div>
                <div class="grid grid-cols-2">
                    <div class="col-span-1 flex justify-start items-start flex-col">
                        <h2 class="text-[42px] font-semibold leading-[120%] text-start">
                            <p>Cách dễ nhất để học tiếng anh!</p>
                        </h2>
                        <button
                            @click="openLink"
                            class="cursor-pointer px-4 py-2 text-center uppercase leading-[28px] flex items-center justify-center font-light rounded-md bg-button text-[19px] text-white hover:opacity-80 mt-4"
                        >
                            Thử sức ngay
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full mt-[128px] max-w-[1206px] mx-auto">
            <div class="flex items-center py-[27px] footer-line">
                <img src="/images/logo/logo.svg" alt="" />
                <dir class="p-0 text-[16px] font-bold uppercase w-full">
                    <p>If You Don’t Walk Today</p>
                    <p>You’ll Have To Run Tomorrow.</p>
                </dir>
            </div>
        </div>
        <footer-component />
    </div>
</template>
<script>
export default {
    data() {
        return {};
    },
    methods: {
        openLink() {
            window.location.href = `${$Api.baseUrl}/english-level-test`;
        },
    },
};
</script>
<style>
.strong {
    -webkit-text-fill-color: transparent;
    background: -webkit-linear-gradient(45deg, #5ebbff -33%, #a174ff 69%);
    -webkit-background-clip: text;
    background-clip: text;
    font-weight: unset;
}
.bg-button {
    background: linear-gradient(177.34deg, #21a2ff, #8951ff 73.36%);
}
.color-gadient {
    color: linear-gradient(177.34deg, #21a2ff, #8951ff 73.36%);
}
.bg-blur-f {
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    background: linear-gradient(
        96.6deg,
        rgba(0, 115, 121, 0.112) 11.23%,
        rgba(0, 95, 100, 0) 115.9%
    );
    border-radius: 20px;
    border: 1px solid rgba(95, 95, 95, 0.1);
}

.bg-description {
    background: linear-gradient(141.34deg, #21a2ff, #8951ff 73.36%);
    border-radius: 50%;
    height: 52px;
    width: 52px;
}

.text-color.active {
    -webkit-text-fill-color: transparent;
    background: linear-gradient(180deg, #5ebbff, #a174ff);
    -webkit-background-clip: text;
    background-clip: text;
    font-weight: 600;
}

.footer-line::after {
    content: "";
    width: 100%;
    border: 1px solid #333c6d;
}
</style>
