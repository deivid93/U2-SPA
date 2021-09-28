<template>
    <div>
        <v-alert type="success" icon="mdi-comment-eye" border="right" :value="true">
            Estas en el home
        </v-alert>
        <v-alert
      dense
      type="info"
    >
      I'm a dense alert with a <strong>type</strong> of info
    </v-alert>
    <v-alert
      dense
      text
      type="success"
    >
      I'm a dense alert with the <strong>text</strong> prop and a <strong>type</strong> of success
    </v-alert>
    <v-alert
      dense
      border="left"
      type="warning"
    >
      I'm a dense alert with the <strong>border</strong> prop and a <strong>type</strong> of warning
    </v-alert>
    </div>
</template>

<script>
export default {
    name: 'Home',
    props: {

    },
}
</script>