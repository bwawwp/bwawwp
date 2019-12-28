# Let's output to a png file
set terminal png size 1024,768
# This sets the aspect ratio of the graph
set size 1, 1
# The file we'll write to
set output "graphs/sequence.png"
# The graph title
set title "Benchmark testing"
# Where to place the legend/key
set key left top
# Draw gridlines oriented on the y-axis
set grid y
# Label the x-axis
set xlabel 'requests'
# Label the y-axis
set ylabel "response time (ms)"
# Tell gnuplot to use tabs as the delimiter instead of spaces (default)
set datafile separator '\t'
# Plot the data
plot "data/testing.tsv" every ::2 using 5 title 'response time' with lines
exit