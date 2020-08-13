<template>
    <div class="container">
        <div v-for="category in categoriesList">
            {{ category.name }}
            <ul v-if="category.tests.length">
                <li v-for="test in category.tests">
                    {{ test.title }}
                    <span style="color:red"
                          @click="like(test)">
                        {{ test.like_counter }}</span>
                    <span @click="deleteTest(test,category.tests)">&times;</span>
                </li>

            </ul>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            categoriesList: [],
        }
    },

    mounted() {
        axios.get('/tests').then((response) => {
            this.categoriesList = response.data;
        })
    },

    methods: {
        like(test) {
            axios.post('/like', {
                id: test.id,
            })
            .then((response) => {
                test.like_counter = response.data;
            })
            .catch(function (error) {
                window.location.href='login';
            });
        },

        deleteTest(test,parentArr) {
            axios.post(`/tests/${test.id}/delete`)
                .then(function (response) {
                    parentArr.splice(parentArr.indexOf(test),1);
                }
            )
        }
    }
}
</script>
