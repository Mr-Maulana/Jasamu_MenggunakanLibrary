from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.cluster import KMeans
from flask import Flask, request, jsonify

app = Flask(__name__)

@app.route('/recommendation', methods=['POST'])
def recommendation():
    input_jasa = request.form['input_jasa']
    categories = ["kategori1", "kategori2", "kategori3"]  # Ganti dengan daftar kategori yang sesuai

    # Preprocessing input
    input_words = input_jasa.lower().split()

    # Gabungkan input dengan daftar kategori
    words = input_words + categories

    # TF-IDF Vectorization
    vectorizer = TfidfVectorizer()
    tfidf_matrix = vectorizer.fit_transform(words)

    # K-Means Clustering
    num_clusters = len(categories)
    kmeans = KMeans(n_clusters=num_clusters)
    kmeans.fit(tfidf_matrix)

    # Dapatkan cluster yang sesuai dengan input
    input_cluster = kmeans.predict(vectorizer.transform([input_jasa]))

    # Dapatkan kategori dari cluster yang sesuai
    recommendation = [categories[i] for i, label in enumerate(kmeans.labels_) if label == input_cluster[0]]

    return jsonify(recommendation)

if __name__ == '__main__':
    app.run(host='localhost', port=5000)
