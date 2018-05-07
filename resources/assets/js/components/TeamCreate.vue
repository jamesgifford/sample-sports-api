<template>
    <div class="team-create container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Add Team</div>

                    <div class="card-body">
                        <form method="post" @submit.prevent="createTeam">
                            <input type="text" name="" value="" placeholder="Name" v-model="team.name">
                            <button type="submit" name="button">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                team: {}
            }
        },

        mounted() {
            console.log('TeamCreate component mounted.');
        },

        methods: {
            createTeam: function () {
                axios.post('/api/teams', this.team).then(response => {
                    this.$root.$emit('team-created', response.data.team);
                });
            }
        }
    }
</script>
