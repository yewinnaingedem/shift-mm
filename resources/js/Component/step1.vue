<template>
    <div class="main-controller">
        <div class="main-color">
            <div class="react-project">
                <div class="content-1">
                    <aside>
                        <div>
                            <h1 class="logo">Shift </h1>
                        </div>
                        <ol class="content-body">
                            <li>
                                <div class="flex">
                                    <div class="mr-3">1</div>
                                    <div>Basic Details </div>
                                </div>
                            </li>
                            <li>
                                <div class="flex">
                                    <div class="mr-3">2</div>
                                    <div>Additonal Fecture </div>
                                </div>
                            </li>
                            <li>
                                <div class="flex">
                                    <div class="mr-3">3</div>
                                    <div>Vehicle History </div>
                                </div>
                            </li>
                        </ol>
                    </aside>
                </div>
                <div class="content-2">
                    <div class="flex-between">
                        <div class="flex">
                            <div>Suzuki</div>
                            <div>2574</div>
                            <div>7777</div>
                        </div>
                        <div>
                            <a href="">Exit </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="css">
@import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200;0,6..12,300;0,6..12,400;0,6..12,500;1,6..12,200;1,6..12,300;1,6..12,400;1,6..12,500&family=Poppins:ital,wght@0,300;0,500;1,200;1,300&family=Roboto:ital,wght@0,100;0,300;1,100&display=swap');
* , *::after , *::before    {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
.main-controller {
    color:  "#18222e";    
}
.content-2 {
    padding: 30px 20px;
    width: 100%;
}
.main-color {
    background-color: "#f7f7f7";
    min-height: 100vh;
}
.flex-between {
    display: flex;
    justify-content: space-between;
    width: 100%;
    overflow: hidden;
}
.react-project {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    display: flex;
    overflow: hidden;
    min-height: 100vh;
    flex-direction: row;
}
.content-1 {
    display: flex;
    width: 351px;
    background-color: #f7f7f7;
}
aside {
    height: 100%;
    flex : 0 1 351px ;
}
.flex {
    display: flex;
    justify-content: center;
    align-items: center;
}
.mr-3{
    margin-right: 5px;
}
.logo {
    padding: 0;
    border: 0 none;
    cursor: pointer;
    line-height: inherit;
    width: 72px;
    height: 22px;
    margin: 30px 24px;
    color: #06CBA3;
    font-weight: 700;
}
ol li {
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    font-weight: 500;
    font-size: 16px;    
    letter-spacing: 0;
    font-family: "Roboto" , sans-serif;
    line-height: 24px;
    width: 50%;
    margin: 30px auto;
}
.content-body{
    margin: 60px auto;
}
</style>

<script>
    import $ from 'jquery'
    import content2 from "./content2.vue";

    
</script>