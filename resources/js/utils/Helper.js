const Helper = {
    random(array) {
        let currentIndex = array.length,
            randomIndex;

        // While there remain elements to shuffle.
        while (currentIndex != 0) {
            // Pick a remaining element.
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex--;

            // And swap it with the current element.
            [array[currentIndex], array[randomIndex]] = [
                array[randomIndex],
                array[currentIndex],
            ];
        }

        return array;
    },
    millisToMinutesAndSeconds(millis) {
        var minutes = Math.floor(millis / 60000);
        var seconds = ((millis % 60000) / 1000).toFixed(0);
        return minutes + ":" + (seconds < 10 ? "0" : "") + seconds;
    },
    formatDateTime(dateTime) {
        if (dateTime) {
            var tmp = new Date(dateTime);
            var HH = tmp.getHours();
            var mm = tmp.getMinutes();
            var dd = tmp.getDate();
            var MM = tmp.getMonth() + 1;
            HH < 10 ? (HH = "0" + HH) : HH;
            mm < 10 ? (mm = "0" + mm) : mm;
            dd < 10 ? (dd = "0" + dd) : dd;
            MM < 10 ? (MM = "0" + MM) : MM;
            var yyyy = tmp.getFullYear();
            return HH + ":" + mm + " " + dd + "/" + MM + "/" + yyyy;
        } else {
            return "";
        }
    },

    randomId(){
        return ([1e7]+-1e3+-4e3+-8e3+-1e11).replace(/[018]/g, c =>
            (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
        );
    }
};

export { Helper };
