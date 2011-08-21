function(doc) {
    for(var i in doc.tags){
        emit([doc.tags[i], doc.date], doc)
    }   
}
