<template>
    <div>
        <h1>
            Créer un groupe pour un Jury
        </h1>
        <div>
            <label for="nameGroup">Donner un nom au groupe de participant</label>
            <input type="text" id="nameGroup" name="nameGroup" v-model="nameForGroup">
        </div>
        <div>
            <label for="oldParticipant">Séléctionné un ancien participant</label>
            <input type="search" id="oldParticipant" name="oldParticipant" v-model="oldPart">
            <label for="oldParticipantMail">L'e-mail :</label>
            <input type="text" id="oldParticipantMail" name="oldParticipantMail" v-model="oldPartMail">
            <input type="submit" value="Ajouter" @click="oldPartInChart">
            <ul class="list-group">
                <li class="list-group-item list-group-item-action" v-for="onePart in searchedPart" :onePart="onePart" :key="onePart.id" @click="choosePart(onePart)">
                    {{onePart.name}}
                </li>
            </ul>
            <p>
                Vos anciens participants séléctionnés :
                <span v-for="oldOnePart in allOldParticipant">
                    {{oldOnePart.name}}
                </span>
            </p>
        </div>
        <div>
            <p>
                Ajouter un nouveau participant
            </p>
            <label for="nameForNewParticipant">Nom du nouveau participant</label>
            <input type="text" id="nameForNewParticipant" name="nameForNewParticipant" v-model="newPart">
            <label for="mailParticipant">E-mail du participant</label>
            <input type="email" id="mailParticipant" name="mailParticipant" v-model="mailOfPart">
            <input type="submit" value="Ajouter" @click="addNewParticipant">
            <p>
                Les nouveaux participants ajoutés et séléctionnés
                <span v-for="participant in allParticipant">
                    {{participant.name}},
                </span>
            </p>
        </div>
        <p>Une fois le bouton 'Envoyer' appuyé, il vous sera possible de rajouter ce groupe dans l'onglet 'Créer un Jury'</p>
        <input type="submit" value="Envoyer" @click="sendForm">
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    export default {
        name: "JiriGroupe",
        data(){
            return{
                newPart : null,
                allPart : null,
                nameForGroup : null,
                mailOfPart : null,
                oldPart : null,
                oldPartMail: null,
                allParticipant : [],
                allOldParticipant : [],
            }
        },
        methods:{
// Le nom des groupes est dans la DB il reste a prendre les anciens et nouveaux étudiants
            sendForm(){
                window.axios.post('/groupe', {name:this.nameForGroup, allParticipant: this.allParticipant, allOldParticipant: this.allOldParticipant })
                    .then(function(response) {
                        console.log(response)
                    })
                    .catch(function(error){
                    console.log(error.response.data.message)
                })
            },

            addNewParticipant(){
                if(this.newPart === '' || this.mailOfPart === ''){
                    return
                }
                const getPart = {
                    name : this.newPart,
                    email : this.mailOfPart
                };
                this.allParticipant.push(getPart);
                this.newPart = '';
                this.mailOfPart = '';
            },
            choosePart(onePart){
                this.oldPart = onePart.name;
                this.oldPartMail = onePart.email;
            },
            oldPartInChart(){
                if(this.oldPart === "" || this.oldPartMail === ""){
                    return
                }
                const getOldPart = {
                    'name' : this.oldPart,
                    'email' : this.oldPartMail,
                };
                this.allOldParticipant.push(getOldPart);
                this.oldPart = '';
                this.oldPartMail = '';
            },
        },
        computed:{
            searchedPart(){
                if(this.oldPart){
                    return this.allStudents.filter((onePart) => {
                        return onePart.name.toLowerCase().match(this.oldPart.toLowerCase())
                    })
                }
            },
            ...mapState(['allStudents'])
        },
        mounted(){
            this.$store.dispatch('setAllStudents')
        }
    }
</script>

<style scoped>

</style>
