<template>
    <div class="main-controller">
        <div class="main-color">
            <div class="react-project">
                <div class="content-1">
                    <aside>
                        <div>
                            <h1 class="logo">Shift </h1>
                        </div>
                        <ol>
                            <li>
                                <div>
                                    <div>Basic Details </div>
                                </div>
                            </li>
                        </ol>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="css">
* , *::after , *::before    {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
.main-controller {
    color:  "#18222e";    
}
.main-color {
    background-color: "#f7f7f7";
    min-height: 100vh;
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
    background-color: "#f7f7f7";

}
aside {
    height: 100%;
    flex : 0 1 351px ;
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
    position: relative;
    font-weight: 500;
    font-size: 16px;    
    letter-spacing: 0;
    line-height: 24px;
}


</style>
<script>
</script>