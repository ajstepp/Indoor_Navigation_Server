public class dijkstra {
 
    private char[] mVexs; // Vertex set
    private int[][] mMatrix;    // Adjacency matrix
    private static final int INF = Integer.MAX_VALUE;

public void dijkstra (int vs, int[] prev, int[] dist) {
    // flag[i]=true vs->i get successfully
    boolean[] flag = new boolean[mVexs.length];
 
    // initialization
    for (int i = 0; i < mVexs.length; i++) {
        flag[i] = false;          // The shortest path of vertex i has not been obtained
        prev[i] = 0;              // The predecessor vertex of vertex i is 0
        dist[i] = mMatrix[vs][i];  // The shortest path of vertex i is the weight from "vertex vs" to "vertex i"。
    }
 
    // vs initialization
    flag[vs] = true;
    dist[vs] = 0;

    // Traverse mVexs.length-1 times
    int k=0;
    for (int i = 1; i < mVexs.length; i++) {
        // find the shortest path；
        // find (k) among the vertices which the shortest path is not obtained
        int min = INF;
        for (int j = 0; j < mVexs.length; j++) {
            if (flag[j]==false && dist[j]<min) {
                min = dist[j];
                k = j;
            }
        }
        // Mark k as the shortest path has been obtained
        flag[k] = true;
 
        // Correct the current shortest path and predecessor vertices
              for (int j = 0; j < mVexs.length; j++) {
            int tmp = (mMatrix[k][j]==INF ? INF : (min + mMatrix[k][j]));
            if (flag[j]==false && (tmp<dist[j]) ) {
                dist[j] = tmp;
                prev[j] = k;
            }
        }
    }
 
    // Print result
    System.out.printf("dijkstra(%c): \n", mVexs[vs]);
    for (int i=0; i < mVexs.length; i++)
        System.out.printf("  shortest(%c, %c)=%d\n", mVexs[vs], mVexs[i], dist[i]);}
}
